<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 10:48 AM
 */

namespace App\MyStuff;


class Object implements ControllableInterface {

    use ObjectTrait;

    public function __construct($type, $location)
    {
        $this->setLocation($location);

        $this->setType($type);


    }

}