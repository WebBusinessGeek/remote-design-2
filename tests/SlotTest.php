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

}
