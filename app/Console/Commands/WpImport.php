<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\WpImport as WpImportLib;

class WpImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wpimport:xml {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import XML from Wordpress';

    protected $wpLib;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WpImportLib $wpLib)
    {
        parent::__construct();
        $this->wpLib = $wpLib;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            $file = $this->argument('file');

            $this->wpLib->getData($file);
            $result = $this->wpLib->import();

            if($result){
                $this->info($file . ' imported!');
            } else {
                $this->info($file . ' NOT imported!');
            }   
        } catch(Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
