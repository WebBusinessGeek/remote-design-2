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

    public function test_commandController_createControllerWithObjectAndState_method_creates_controller_with_object_and_state_bound()
    {
        $commandController = new CommandController();

        $slot = $commandController->createControllerWithObjectAndState('light', 'kitchen', 'on', 'off');

        $this->assertEquals(true, is_object($slot));
        $this->assertObjectHasAttribute('object', $slot,'');

    }

    public function test_commandController_createNewRemote_method_creates_and_returns_a_remote_class_instance()
    {
        $commandController = new CommandController();

        $remote = $commandController->createNewRemote();

        $this->assertEquals(true, is_object($remote));
        $this->assertObjectHasAttribute('controller', $remote, '');
    }

    public function test_commandController_addControllerToRemote_method_adds_controller_to_remote_object()
    {
        $commandController = new CommandController();

        $remote = $commandController->createNewRemote();

        $slot = $commandController->createControllerWithObjectAndState('light', 'kitchen','on', 'off');

        $commandController->addControllerToRemote($remote, $slot);

        $this->assertEquals('light in the kitchen is on', $remote->activate(1));
        $this->assertEquals('light in the kitchen is off', $remote->deactivate(1));
    }

    public function test_commandController_createControllerAndAddToRemote_method_creates_a_controller_state_and_object_and_add_it_to_a_remote()
    {
        $commandController = new CommandController();

        $remote = $commandController->createNewRemote();

        $commandController->createControllerAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $remote->activate(1));
        $this->assertEquals('light in the kitchen is off', $remote->deactivate(1));
    }

    public function test_commandController_activateControllerOnRemote_method_calls_activate_on_correct_controller_on_remote()
    {
        $commandController = new CommandController();

        $remote = $commandController->createNewRemote();

        $commandController->createControllerAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');
        $commandController->createControllerAndAddToRemote($remote, 'fan', 'office', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $commandController->activateControllerOnRemote($remote, 1));

        $this->assertEquals('fan in the office is on', $commandController->activateControllerOnRemote($remote, 2));

    }

    public function test_commandController_deactivateControllerOnRemote_method_calls_deactivate_on_correct_controller_on_remote()
    {
        $commandController = new CommandController();

        $remote = $commandController->createNewRemote();

        $commandController->createControllerAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');
        $commandController->createControllerAndAddToRemote($remote, 'fan', 'office', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $commandController->activateControllerOnRemote($remote, 1));
        $this->assertEquals('fan in the office is on', $commandController->activateControllerOnRemote($remote, 2));


        $this->assertEquals('light in the kitchen is off', $commandController->deactivateControllerOnRemote($remote, 1));

        $this->assertEquals('fan in the office is off', $commandController->deactivateControllerOnRemote($remote, 2));
    }

}
