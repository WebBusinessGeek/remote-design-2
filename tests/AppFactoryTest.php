<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:55 PM
 */

namespace tests;


use App\MyStuff\AppFactory;


class AppFactoryTest extends \PHPUnit_Framework_TestCase {

    public function test_appFactory_createNewState_method_creates_a_new_state()
    {
        $factory = new AppFactory();

        $state = $factory->createNewState('on', 'off');

        $this->assertEquals(' is off', $state->getCurrentState());
    }

    public function test_appFactory_createNewObject_method_creates_a_new_object()
    {
        $factory = new AppFactory();

        $object = $factory->createNewObject('light', 'kitchen');

        $this->assertEquals('light', $object->type);
        $this->assertEquals('kitchen', $object->location);
    }

}
