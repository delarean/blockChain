<?php

namespace App\Console\Commands;

use App\Classes\BlockChain;
use Illuminate\Console\Command;

class makeTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:transaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $blockCh = new BlockChain;

        $bin = $blockCh->addressToBin("8001400002000001");

        $msgPack =  $blockCh->messagePackFormat($bin);

        var_dump($msgPack);

    }
}
