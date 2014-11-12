<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 11:44 AM
 */

class SlotTest extends PHPUnit_Framework_TestCase {

    public function test_slot_instantiates_with_a_controllable_object()
    {
        $light = new \App\MyStuff\Object('light', 'kitchen');

        $slot = new \App\MyStuff\Slot($light);

        $this->assertEquals('light', $slot->object->getType());
        $this->assertEquals('kitchen', $slot->object->getLocation());

    }

    public function test_slot_can_call_activate_and_deactivate_functions()
    {
        $state = new \App\MyStuff\State('on', 'off');
        $light = new \App\MyStuff\Object('light', 'kitchen');
        $light->addState($state);

        $slot = new \App\MyStuff\Slot($light);

        $this->assertEquals('light in the kitchen is on', $slot->activate());
        $this->assertEquals('light in the kitchen is off', $slot->deactivate());

    }

}
