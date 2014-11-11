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

}