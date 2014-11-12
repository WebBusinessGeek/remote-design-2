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

    public function test_object_can_call_undo_on_state()
    {
        $state = new State('on', 'off');
        $light = new Object('light', 'kitchen');
        $light->addState($state);

        $this->assertEquals('light in the kitchen is on', $light->activate());
        $this->assertEquals('light in the kitchen is off', $light->deactivate());

        $this->assertEquals('light in the kitchen is on', $light->undoTest());
        $this->assertEquals('light in the kitchen is off', $light->undoTest());

    }

    public function test_object_returns_cantUndo_if_state_is_undoable()
    {
        $state = new State('on', 'off');
        $light = new Object('light', 'kitchen');
        $light->addState($state);

        //$this->assertEquals('cant undo', $light->newUndo());

        $light->activate();
        $this->assertEquals('light in the kitchen is off', $light->undo());

        $light->activate();
        $this->assertEquals('light in the kitchen is off', $light->undo());

        $light->activate();
        $light->deactivate();
        $this->assertEquals('light in the kitchen is on', $light->undo());


        $this->assertEquals('light in the kitchen is off', $light->undo());

        $light->activate();
        $light->deactivate();
        $light->activate();
        $light->deactivate();
        $this->assertEquals('light in the kitchen is on', $light->undo());
        $this->assertEquals('light in the kitchen is off', $light->undo());
        $this->assertEquals('light in the kitchen is on', $light->undo());
        $this->assertEquals('light in the kitchen is off', $light->undo());

        //should be cant undo
        $this->assertEquals('cant undo', $light->undo());


    }
}
