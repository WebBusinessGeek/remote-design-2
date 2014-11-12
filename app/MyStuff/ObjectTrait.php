<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/10/14
 * Time: 8:11 PM
 */

namespace App\MyStuff;


trait ObjectTrait {

    public $state;

    public $location;

    public $type;

    public function getLocation()
    {
        return $this->location;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }


}