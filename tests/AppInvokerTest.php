<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/16/14
 * Time: 6:13 PM
 */

namespace tests;


use App\MyStuff\AppFactory;
use App\MyStuff\AppInvoker;

class AppInvokerTest extends \PHPUnit_Framework_TestCase {

    public function test_appInvoker_addStateToObject_method_adds_state_to_an_object()
    {
        $invoker = new AppInvoker();

        $factory = new AppFactory();

        $state = $factory->createNewState('on', 'off');
        $light = $factory->createNewObject('light', 'kitchen');

        $invoker->addStateToObject($light, $state);

        $this->assertEquals('light in the kitchen is on', $light->activate());
        $this->assertEquals('light in the kitchen is off', $light->deactivate());
    }
}
