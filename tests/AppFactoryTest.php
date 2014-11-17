<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 5:55 PM
 */

namespace tests;


use App\MyStuff\AppFactory;
use Illuminate\Support\Facades\App;


class AppFactoryTest extends \PHPUnit_Framework_TestCase {

    public function test_appFactory_createNewState_method_creates_a_new_state()
    {
        $factory = new AppFactory();

        $state = $factory->createNewState('on', 'off');

        $this->assertEquals(' is off', $state->getCurrentState());
    }

    public function test_appFactory_createNewObject_method_creates_a_new_object()
    {
        $factory = new AppFactory();

        $object = $factory->createNewObject('light', 'kitchen');

        $this->assertEquals('light', $object->type);
        $this->assertEquals('kitchen', $object->location);
    }

    public function test_appFactory_createNewController_method_creates_a_new_controller()
    {
        $factory = new AppFactory();

        $state = $factory->createNewState('on', 'off');
        $light = $factory->createNewObject('light', 'kitchen');

        $light->addState($state);
        $slot = $factory->createNewController($light);

        $this->assertEquals('light in the kitchen is on', $slot->activate());
        $this->assertEquals('light in the kitchen is off', $slot->deactivate());
    }

    public function test_appFactory_createNewRemote_method_creates_a_new_remote()
    {
        $factory = new AppFactory();

        $remote = $factory->createNewRemote();

        $this->assertEquals(0, count($remote->controller));
        $this->assertEquals(0, count($remote->lastControllerUsedLog));
        $this->assertEquals(0, count($remote->lastActionUsedLog));

        $state = $factory->createNewState('on', 'off');
        $light = $factory->createNewObject('light', 'kitchen');

        $light->addState($state);
        $slot = $factory->createNewController($light);

        $remote->addController($slot);

        $this->assertEquals(1, count($remote->controller));

    }

}
