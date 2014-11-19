<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/17/14
 * Time: 8:20 PM
 */

namespace tests;


use App\Http\Controllers\RequestController;
use App\MyStuff\State;
use Symfony\Component\Routing\Tests\Fixtures\RedirectableUrlMatcher;

class RequestControllerTest extends \PHPUnit_Framework_TestCase {

    public function test_requestController_is_constructed_with_commandController()
    {
        $requestController = new RequestController();

        $this->assertEquals(true, is_object($requestController->commandController));
        $this->assertObjectHasAttribute('factory', $requestController->commandController);
        $this->assertObjectHasAttribute('invoker', $requestController->commandController);
    }


    public function test_requestController_createNewRemote_method_creates_a_new_remote()
    {
        $requestController = new RequestController();

        $remote = $requestController->createNewRemote();

        $this->assertEquals(true, is_object($remote));

        $requestController->commandController->createControllerAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $remote->activate(1));
    }


    public function test_requestController_createController_method_creates_a_object_state_and_controller_and_adds_to_remote()
    {
        $requestController = new RequestController();

        $remote = $requestController->createNewRemote();

        $requestController->createControllerWithObjectAndStateAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $remote->activate(1));
    }

    public function test_requestController_activate_method_activates_a_controller()
    {
        $requestController = new RequestController();

        $remote = $requestController->createNewRemote();

        $requestController->createControllerWithObjectAndStateAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');

        $this->assertEquals('light in the kitchen is on', $requestController->activateControllerOnRemote($remote, 1));
    }

    public function test_requestController_deactivate_method_deactivates_a_controller()
    {
        $requestController = new RequestController();

        $remote = $requestController->createNewRemote();

        $requestController->createControllerWithObjectAndStateAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');

        $requestController->activateControllerOnRemote($remote, 1);

        $this->assertEquals('light in the kitchen is off', $requestController->deactivateControllerOnRemote($remote, 1));
    }

    //undo on remote
    public function test_requestController_undo_method_calls_undo_on_a_remote_object()
    {
        $requestController = new RequestController();

        $remote = $requestController->createNewRemote();

        $requestController->createControllerWithObjectAndStateAndAddToRemote($remote, 'light', 'kitchen', 'on', 'off');

        $requestController->activateControllerOnRemote($remote, 1);

        $requestController->deactivateControllerOnRemote($remote, 1);

        $this->assertEquals('light in the kitchen is on', $requestController->undoOnRemote($remote));
        $this->assertEquals('light in the kitchen is off', $requestController->undoOnRemote($remote));
        $this->assertEquals('Cant undo. You have to do something first.', $requestController->undoOnRemote($remote));
    }
}
