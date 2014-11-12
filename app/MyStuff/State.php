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
        $this->currentState = $this->deactivate();

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
        return ' is ' . $this->getActivator();
    }

    public function deactivate()
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

        $this->currentState = $stateChangeMethod;

        return $this->currentState;
    }

    public function getPreviousState()
    {
        return $this->previousState;
    }

}