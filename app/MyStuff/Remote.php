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
        return $this->getController($slot)->activate();
    }

    public function deactivate($slot)
    {
        return $this->getController($slot)->deactivate();
    }

}