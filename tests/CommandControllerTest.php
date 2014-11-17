<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/17/14
 * Time: 12:38 PM
 */

namespace tests;


use App\MyStuff\CommandController;

class CommandControllerTest extends \PHPUnit_Framework_TestCase {

    public function test_commandController_is_constructed_with_a_factory_invoker_and_repository()
    {
        $commandController = new CommandController();

        $this->assertEquals(true, is_object($commandController->invoker));
        $this->assertEquals(true, is_object($commandController->factory));
        $this->assertEquals(true, is_object($commandController->repository));


    }

    public function test_commandController_createObjectAndState_method_creates_object_and_state_and_binds_them()
    {
        $commandController = new CommandController();

        $light = $commandController->createObjectAndState('light', 'kitchen', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $light->activate());
        $this->assertEquals('light in the kitchen is off', $light->deactivate());
    }

}
