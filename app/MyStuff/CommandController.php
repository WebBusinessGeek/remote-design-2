<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:48 PM
 */

namespace App\MyStuff;


use Illuminate\Container\Container;
use Illuminate\Foundation\Application;

class CommandController {

    public $factory;

    public $repository;

    public $invoker;


    public function __construct()
    {
//        $app = Application::getInstance();


        $app = new Application();

        $app->bind('App\MyStuff\AppFactoryContract',
            'App\MyStuff\AppFactory'
        );

        $app->bind('App\MyStuff\AppInvokerContract',
            'App\MyStuff\AppInvoker'
        );

        $app->bind('App\MyStuff\AppRepositoryContract',
            'App\MyStuff\AppRepository'
        );

        $this->factory = $app->make('App\MyStuff\AppFactoryContract');
        $this->invoker = $app->make('App\MyStuff\AppInvokerContract');
        $this->repository = $app->make('App\MyStuff\AppRepositoryContract');

    }






}