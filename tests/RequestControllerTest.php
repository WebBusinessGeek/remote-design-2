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
}
