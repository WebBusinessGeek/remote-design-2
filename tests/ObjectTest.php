<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 2:30 PM
 */

namespace Tests\ObjectTest;


use App\MyStuff\Object;
use App\MyStuff\State;

class ObjectTest extends \PHPUnit_Framework_TestCase {

    public function test_object_can_add_stateable_object()
    {
        $state = new State('on', 'off');

        $light = new Object('light', 'kitchen');

        $light->addState($state);

        $this->assertEquals('on', $light->state->getActivator());
        $this->assertEquals('off', $light->state->getDeactivator());
    }

    public function test_object_can_call_activate_and_deactivate_function_using_state()
    {
        $state = new State('on', 'off');
        $light = new Object('light', 'kitchen');
        $light->addState($state);

        $state2 = new State('up', 'down');
        $garageDoor = new Object('door','garage');
        $garageDoor->addState($state2);

        $this->assertEquals('light in the kitchen is on', $light->activate());
        $this->assertEquals('light in the kitchen is off', $light->deactivate());

        $this->assertEquals('door in the garage is up', $garageDoor->activate());
        $this->assertEquals('door in the garage is down', $garageDoor->deactivate());


    }

}
