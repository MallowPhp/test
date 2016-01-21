<?php

namespace Mallow\Testing;

use Illuminate\Support\ServiceProvider;
use Mallow\Testing\Commands\TestCommand;

class MallowTestingLayout extends ServiceProvider{
    public function register()
    {
       $this->registerTestingCommand();
    }
    /*
     *
     *
     */
    public function boot(){
        //loading the routes.php file
        $this->commands('mallow.testing');
    }
    /*
     *
     *
     */
    protected function registerTestingCommand(){
        $this->app['mallow.testing'] = $this->app->share(function(){
            return new TestCommand();
        });
    }
}