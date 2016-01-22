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
            $testcase_main = "tests/TestCase.php";
            if(File::exists($testcase_main)){
                $get_contents = __DIR__ . "/../BaseTestcase/Testcase.php";
                if(File::exists($get_contents)){
                    $success = File::copyDirectory($sourceDir, $destinationDir);
                    file_put_contents($testcase_main,file_get_contents($get_contents));
                    if($success){
                        $this->info("Testing directory for local database( Temporary Storage ) is successfully created");
                    }
                    else{
                        $this->error("There was an error in creating local testing folder");
                    }
                }
                else{
                    $this->error("No file in package directory");
                }
            }
            else{
                $this->error("No file in tests directory");
            }

        }
        catch(\Exception $e){
            die("The base file doesn't exist");
        }
    }
}