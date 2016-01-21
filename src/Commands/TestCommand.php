<?php

namespace Mallow\Testing\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class TestCommand extends Command{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mallow:test {name}';

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
        if ($name = $this->argument('name')) {
            Artisan::call('make:test',[
                'name' => $name
            ]);
            try{
                $test_file = __DIR__."\\LayoutTest.php";
                $test_content = File::get($test_file);
                $filename = "tests\\".$name.'.php';
                file_put_contents($filename,str_replace("LayoutTest",$name,file_get_contents($test_file)));
                $this->info("Testing Layout file created successfully,follow comments in file to test your CRUD");
            }
            catch(\Exception $e){
                die("The file doesn't exist");
            }
        }
    }
}