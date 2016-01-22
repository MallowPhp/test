<?php

namespace Mallow\Testing\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class AutomateTestWithoutDbCommand extends Command{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mallow:local-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a testing file with the given class name in tests folder';

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
        try{
            $sourceDir = __DIR__."/../testing";
            $destinationDir = "config/testing";
            $success = File::copyDirectory($sourceDir, $destinationDir);
            if($success){
                $this->info("Testing directory for local database( Temporary Storage ) is successfully created");
            }
            else{
                $this->error("There was an error in creating local testing folder");
            }
        }
        catch(\Exception $e){
            die("The base file doesn't exist");
        }
    }
}