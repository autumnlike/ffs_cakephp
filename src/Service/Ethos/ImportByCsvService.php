<?php
declare(strict_types=1);

namespace App\Service\Ethos;

use Cake\ORM\TableRegistry;
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
        $connection = $membersTable->getConnection();
        $connection->begin();
        try {
            foreach ($file as $num => $row) {
                if ($num === 0) {
                    // 先頭行はヘッダ
                    continue;
                }
                if (empty($row[7])) {
                    // 診断前のデータも入ってくる
                    continue;
                }

                $member = $membersTable->findOrCreateByEthos($row);
                $memberFfsDiagnos = $memberFfsDiagnosesTable->findOrCreateByEthos($member->id, $row);
                $memberStressesTable->createAllByEthos($member->id, $row);
            }
            $connection->commit();
        } catch (\Exception $e) {
            $connection->rollback();
        }
    }
}
