<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/10/14
 * Time: 8:10 PM
 */

namespace App\MyStuff;


class Slot implements ControllerInterface {


    public $object;

    public function __construct(ControllableInterface $controllable)
    {
        $this->object = $controllable;
    }

}