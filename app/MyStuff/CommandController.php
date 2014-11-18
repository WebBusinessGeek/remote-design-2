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
        $app = new Application();

        //very ugly workaround for resolvement of container bindings issue in Laravel 5 pre-release
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

    public function createObjectAndState($type, $location, $default, $deactivate, $low = null, $high = null)
    {
        $state = $this->factory->createNewState($default, $deactivate, $low, $high);

        $object = $this->factory->createNewObject($type, $location);

        $this->invoker->addStateToObject($object, $state);

        return $object;
    }

    public function createControllerWithObjectAndState($type, $location, $default, $deactivate, $low = null, $high = null)
    {
        return $this->factory->createNewController($this->createObjectAndState($type, $location, $default, $deactivate, $low, $high));
    }


    public function createNewRemote()
    {
        return $this->factory->createNewRemote();
    }

    public function addControllerToRemote(Remote $remote, ControllerInterface $controllerInterface)
    {
        return $this->invoker->addControllerToRemote($remote, $controllerInterface);
    }

    public function createControllerAndAddToRemote(Remote $remote, $type, $location, $default, $deactivate, $low = null, $high = null)
    {
        $controller = $this->createControllerWithObjectAndState($type, $location, $default, $deactivate, $low, $high);

        return $this->addControllerToRemote($remote, $controller);
    }

    public function activateControllerOnRemote(Remote $remote, $numberOfController)
    {
        return $this->invoker->activateControllerOnRemote($remote, $numberOfController);
    }

    public function deactivateControllerOnRemote(Remote $remote, $numberOfController)
    {
        return $this->invoker->deactivateControllerOnRemote($remote, $numberOfController);
    }

}