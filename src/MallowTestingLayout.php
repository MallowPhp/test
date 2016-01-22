<?php

namespace Mallow\Testing;

use Illuminate\Support\ServiceProvider;
use Mallow\Testing\Commands\AutomateTestWithoutDbCommand;
use Mallow\Testing\Commands\TestCommand;

class MallowTestingLayout extends ServiceProvider{
    public function register()
    {
        $this->registerTestingCommand();
        $this->createTestsDirectory();
    }
    /*
     *
     *
     */
    public function boot(){
        //loading the routes.php file
        $this->commands('mallow.testing');
        $this->commands('mallow.tests');
    }
    /*
     *
     * Registering the registerTestingCommand
     *
     */
    protected function registerTestingCommand(){
        $this->app['mallow.testing'] = $this->app->share(function(){
            return new TestCommand();
        });
    }
    /*
     *
     *
     *
     */
    protected function createTestsDirectory(){
    $this->app['mallow.tests'] = $this->app->share(function(){
        return new AutomateTestWithoutDbCommand();
    });
}
}