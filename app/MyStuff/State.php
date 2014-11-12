<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 7:49 PM
 */

namespace App\MyStuff;


class State implements StateAbleInterface{

    use StateAbleTrait;


    public function __construct($default, $deactivate, $low = null, $high = null)
    {
        $this->activator = $default;
        $this->deactivator = $deactivate;
        $this->currentState = $this->deactivateTest();
        $this->previousStateLog = [];

        if(isset($high))
        {
            $this->highSetting = $high;
        }
        if(isset($low))
        {
            $this->lowSetting = $low;
        }

    }

    public function activate()
    {
        $this->changeOfState($this->addis($this->getActivator()));
        return ' is ' . $this->getActivator();
    }

    public function deactivate()
    {
        $this->changeOfState($this->addis($this->getDeactivator()));
        return ' is ' . $this->getDeactivator();
    }


    public function activateTest()
    {
        return ' is ' . $this->getActivator();
    }

    public function deactivateTest()
    {
        return ' is ' . $this->getDeactivator();
    }

    public function getActivator()
    {
        return $this->activator;
    }

    public function getDeactivator()
    {
        return $this->deactivator;
    }

    public function getLow()
    {
        return $this->lowSetting;
    }

    public function getHigh()
    {
        return $this->highSetting;
    }

    public function getCurrentState()
    {
        return $this->currentState;
    }

    public function changeOfState($stateChangeMethod)
    {
        $this->previousState = $this->currentState;

        $this->previousStateLog[] = $this->previousState;

        $this->currentState = $stateChangeMethod;

        return $this->currentState;
    }

    public function getPreviousState()
    {
        return $this->previousState;
    }

    public function getPreviousStateLogCount()
    {
        return count($this->previousStateLog);
    }

    public function getLastPreviousStateFromLogThenPop()
    {
        return array_pop($this->previousStateLog);
    }

    public function adjustPreviousStateAfterUndo()
    {
        $this->previousState = end($this->previousStateLog);
    }

    public function undo()
    {
        if($this->previousState == null)
        {
            return 'cant undo';
        }
        $this->currentState = $this->getLastPreviousStateFromLogThenPop();

        $this->adjustPreviousStateAfterUndo();

        return $this->currentState;
    }

    public function addis($argument)
    {
        return ' is '. $argument;
    }

}