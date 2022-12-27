<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use App\Service\Ethos\ImportByCsvService;
use SplFileObject;

/**
 * ETHOSシステムでのエクスポートファイルをインポートする
 */
class ImportByEthosCsvCommand extends Command
{
    // ./bin/cake ImportByEthosCsv
    public function execute(Arguments $args, ConsoleIo $io)
    {
        // 仮
        $filename = TMP . 'ETHOS_sjis.csv';
        try {
            ImportByCsvService::import($filename);
        } catch (\Exception $e) {
            $io->abort($e->getMessage());
        }
    }
}
