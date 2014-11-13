<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/10/14
 * Time: 8:08 PM
 */

namespace App\MyStuff;


class Remote {

    public $controller;

    public $lastController;

    public $lastAction;

    public $lastControllerUsedLog;

    public $lastActionUsedLog;

    public function __construct()
    {
        $this->controller = [];
    }

    public function addController(ControllerInterface $controller)
    {
        $this->controller[] = $controller;

        return $this;
    }

    public function getController($number)
    {
        $number--;
        return $this->controller[$number];
    }

    public function getObject($number)
    {
        $controller = $this->getController($number);

        return $controller->object;
    }

    public function getObjectType($number)
    {
        $controller = $this->getController($number);

        return $controller->object->getType();
    }

    public function getObjectLocation($number)
    {
        $controller = $this->getController($number);

        return $controller->object->getLocation();
    }

    public function activate($slot)
    {
        $this->setLastControllerUsed($slot);

        $this->setLastActionUsed('activate');

        $this->pushLastActionToLog('activate')->pushLastControllerToLog($slot);

        return $this->getController($slot)->activate();
    }

    public function deactivate($slot)
    {
        $this->setLastControllerUsed($slot);

        $this->setLastActionUsed('deactivate');

        $this->pushLastActionToLog('deactivate')->pushLastControllerToLog($slot);

        return $this->getController($slot)->deactivate();
    }

    public function getLastControllerUsed()
    {
        return $this->lastController;
    }

    public function setLastControllerUsed($slot)
    {
        return $this->lastController = $this->getController($slot);
    }

    public function getLastActionUsed()
    {
        return $this->lastAction;
    }

    public function setLastActionUsed($action)
    {
        $this->lastAction = $action;
    }

    public function forceActivate($slot)
    {
        return $this->getController($slot)->activate();
    }

    public function forceDeactivate($slot)
    {
        return $this->getController($slot)->deactivate();
    }

    public function callControllerAndAction($slot, $action)
    {
        return $slot->$action();
    }

    public function pushLastActionToLog($action)
    {
        $this->lastActionUsedLog[] = $action;

        return $this;
    }

    public function pushLastControllerToLog($controller)
    {
        $this->lastControllerUsedLog[] = $controller;

        return $this;
    }



}