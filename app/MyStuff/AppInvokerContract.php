<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:53 PM
 */

namespace App\MyStuff;


interface AppInvokerContract {

    public function addStateToObject(ControllableInterface $controllable, StateAbleInterface $state);

    public function addControllerToRemote(Remote $remote, ControllerInterface $controller);

    public function activateControllerOnRemote(Remote $remote, $controllerNumber);

    public function deactivateControllerOnRemote(Remote $remote, $controllerNumber);
}