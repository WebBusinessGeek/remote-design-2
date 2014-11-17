<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:47 PM
 */

namespace App\MyStuff;


class AppFactory implements AppFactoryContract {


    public function createNewState($default, $deactivate, $low = null, $high = null)
    {
        return new State($default, $deactivate, $low, $high);
    }

    public function createNewObject($type, $location)
    {
        return new Object($type, $location);
    }

    public function createNewController(ControllableInterface $controllable)
    {
        return new Slot($controllable);
    }

}