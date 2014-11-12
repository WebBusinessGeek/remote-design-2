<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 7:44 PM
 */

namespace App\MyStuff;


interface StateAbleInterface {

    public function activateTest();

    public function deactivate();

    public function undo();


}