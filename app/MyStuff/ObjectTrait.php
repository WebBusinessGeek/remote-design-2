<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/10/14
 * Time: 8:11 PM
 */

namespace App\MyStuff;


trait ObjectTrait {

    public $location;

    public $name;

    public function getLocation()
    {
        return $this->location;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }


}