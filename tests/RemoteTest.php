<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 11:44 AM
 */

class RemoteTest extends PHPUnit_Framework_TestCase {

    public function test_remote_can_add_a_controller_which_owns_an_object()
    {
        $remote = new \App\MyStuff\Remote();

        $light = new \App\MyStuff\Object('light', 'kitchen');
        $slot = new \App\MyStuff\Slot($light);

        $remote->addController($slot);

        $this->assertEquals('light', $remote->controller[0]->object->getType());
        $this->assertEquals('kitchen', $remote->controller[0]->object->getLocation());

    }

        public function test_remote_can_have_multiple_controllers_which_own_objects()
        {
            $remote = new \App\MyStuff\Remote();

            $light = new \App\MyStuff\Object('light', 'kitchen');
            $fan = new \App\MyStuff\Object('fan', 'livingRoom');

            $slot1 = new \App\MyStuff\Slot($light);
            $slot2 = new \App\MyStuff\Slot($fan);

            $remote->addController($slot1)->addController($slot2);

            $this->assertEquals('light', $remote->controller[0]->object->getType());
            $this->assertEquals('kitchen', $remote->controller[0]->object->getLocation());

            $this->assertEquals('fan', $remote->controller[1]->object->getType());
            $this->assertEquals('livingRoom', $remote->controller[1]->object->getLocation());
        }

        public function test_remote_can_select_correct_controller_via_a_function()
        {
            $remote = new \App\MyStuff\Remote();

            $light = new \App\MyStuff\Object('light', 'kitchen');
            $slot1 = new \App\MyStuff\Slot($light);

            $fan = new \App\MyStuff\Object('fan', 'livingRoom');
            $slot2 = new \App\MyStuff\Slot($fan);

            $remote->addController($slot1)->addController($slot2);

            $this->assertEquals('light', $remote->getController(1)->object->getType());
            $this->assertEquals('fan', $remote->getController(2)->object->getType());
        }

        public function test_remote_can_get_object_via_a_function()
        {
            $remote = new \App\MyStuff\Remote();

            $light = new \App\MyStuff\Object('light', 'kitchen');
            $slot1 = new \App\MyStuff\Slot($light);

            $fan = new \App\MyStuff\Object('fan', 'livingRoom');
            $slot2 = new \App\MyStuff\Slot($fan);

            $remote->addController($slot1)->addController($slot2);

            $this->assertEquals('light',$remote->getObject(1)->getType());
            $this->assertEquals('kitchen', $remote->getObject(1)->getLocation());

            $this->assertEquals('fan', $remote->getObject(2)->getType());
            $this->assertEquals('livingRoom', $remote->getObject(2)->getLocation());

        }

        public function test_remote_can_get_location_and_type_of_object_via_a_function()
        {
            $remote = new \App\MyStuff\Remote();

            $light = new \App\MyStuff\Object('light', 'kitchen');
            $slot1 = new \App\MyStuff\Slot($light);

            $fan = new \App\MyStuff\Object('fan', 'livingRoom');
            $slot2 = new \App\MyStuff\Slot($fan);

            $remote->addController($slot1)->addController($slot2);

            $this->assertEquals('light', $remote->getObjectType(1));
            $this->assertEquals('fan', $remote->getObjectType(2));

            $this->assertEquals('kitchen',$remote->getObjectLocation(1));
            $this->assertEquals('livingRoom', $remote->getObjectLocation(2));
        }

        public function test_remote_can_call_activate_and_deactivate_functions()
        {
            $remote = new \App\MyStuff\Remote();

            $state = new \App\MyStuff\State('on', 'off');
            $light = new \App\MyStuff\Object('light', 'kitchen');
            $light->addState($state);
            $slot = new \App\MyStuff\Slot($light);

            $remote->addController($slot);
            $this->assertEquals('light in the kitchen is on', $remote->getController(1)->activate());
            $this->assertEquals('light in the kitchen is off', $remote->getController(1)->deactivate());

        }


}
