<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:48 PM
 */

namespace App\MyStuff;


class AppInvoker implements AppInvokerContract{


    public function addStateToObject(ControllableInterface $controllable, StateAbleInterface $state)
    {
        return $controllable->addState($state);
    }

    public function addControllerToRemote(Remote $remote, ControllerInterface $controller)
    {
        return $remote->addController($controller);
    }

    public function activateControllerOnRemote(Remote $remote, $controllerNumber)
    {
        return $remote->activate($controllerNumber);
    }

    public function deactivateControllerOnRemote(Remote $remote, $controllerNumber)
    {
        return $remote->deactivate($controllerNumber);
    }

    public function undoOnRemote(Remote $remote)
    {
        return $remote->undo();
    }
}