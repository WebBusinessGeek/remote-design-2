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
}