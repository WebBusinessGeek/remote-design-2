<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:51 PM
 */

namespace App\MyStuff;


interface AppFactoryContract {

    public function createNewState($default, $deactivate, $low = null, $high = null);

    public function createNewObject($type, $location);

    public function createNewController(ControllableInterface $controllable);

    public function createNewRemote();


}