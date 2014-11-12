<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 7:55 PM
 */

namespace Tests\StateTest;


use App\MyStuff\State;

class StateTest extends \PHPUnit_Framework_TestCase {

    public function test_state_instantiates_with_activate_and_deactivate_set()
    {
        $state = new State('open', 'close');

        $this->assertEquals('open', $state->getActivator());
        $this->assertEquals('close', $state->getDeactivator());

    }

    public function test_state_can_instantiate_with_low_and_high_settings()
    {
        $state = new State('open', 'close', 'low', 'high');

        $this->assertEquals('low', $state->getLow());
        $this->assertEquals('high', $state->getHigh());
    }

    public function test_state_can_call_activate_and_deactivate_function()
    {
        $state = new State('open', 'close');

        $this->assertEquals(' is open', $state->activate());
        $this->assertEquals(' is close', $state->deactivate());
    }

}
