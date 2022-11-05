<?php
declare(strict_types=1);

namespace App\Service\Ethos;

use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;
use SplFileObject;

class ImportByCsvService
{
    public static function import(string $filename)
    {
        $file = new SplFileObject($filename);
        // 事前チェック
        // ETHOSからダウンロード時に指定できるため
        $encode = exec("nkf -g {$filename}");
        if ($encode !== 'UTF-8') {
            throw \Exception('ファイルがUTF-8ではありません: ' . $encode);
        }
        
        // @see https://www.php.net/manual/ja/class.splfileobject.php#splfileobject.constants
        $file->setFlags(
            SplFileObject::READ_CSV |
            SplFileObject::READ_AHEAD |
            SplFileObject::SKIP_EMPTY |
            SplFileObject::DROP_NEW_LINE
        );

        $membersTable = TableRegistry::getTableLocator()->get('Members');
        $memberFfsDiagnosesTable = TableRegistry::getTableLocator()->get('MemberFfsDiagnoses');
        $memberStressesTable = TableRegistry::getTableLocator()->get('MemberStresses');
        foreach ($file as $num => $row) {
            if ($num === 0) {
                // 先頭行はヘッダ
                continue;
            }
            // TODO 診断されてないデータは無視する
            // TODO 同じ人は重複させない
            $member = $membersTable->newEmptyEntity();
            $member->key = $row[1];
            $member->email = $row[2];
            $member->name = $row[3] . $row[4];

            $memberFfsDiagnos = $memberFfsDiagnosesTable->newEmptyEntity();
            $memberFfsDiagnos->a = $row[7];
            $memberFfsDiagnos->b = $row[8];
            $memberFfsDiagnos->c = $row[9];
            $memberFfsDiagnos->d = $row[10];
            $memberFfsDiagnos->e = $row[11];
            $memberFfsDiagnos->four_type = $row[13];
            $memberFfsDiagnos->ninety_one_type = $row[14];

            // ストレス診断履歴
            $memberStresses = [];
            foreach ([18, 20, 22, 24, 26, 28] as $key) {
                if ((bool)$row[$key] === FALSE) {
                    // 直近から入るのでこれ以降入ることは無い
                    break;
                }

                // TODO 同じストレス診断は重複させない
                $memberStress = $memberStressesTable->newEmptyEntity();
                $memberStress->point = $row[$key];
                $memberStress->diagnostic_at = new FrozenTime($row[$key+1]);
                $memberStresses[] = $memberStress;
            }
            $connection = $membersTable->getConnection();
            $member->member_ffs_diagnosis = $memberFfsDiagnos;
            $member->member_stresses = $memberStresses;
            // TODO 値チェック
            // TODO 失敗時の出力
            $membersTable->save($member);
        }
    }
}
