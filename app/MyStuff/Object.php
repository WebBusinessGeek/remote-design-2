<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/11/14
 * Time: 10:48 AM
 */

namespace App\MyStuff;


class Object implements ControllableInterface {

    use ObjectTrait;

    public function __construct($type, $location)
    {
        $this->setLocation($location);

        $this->setType($type);


    }

    public function addState(StateAbleInterface $state)
    {
        $this->state = $state;
    }

    public function activate()
    {
        return $this->type .' in the '. $this->location . $this->state->activate();
    }

    public function deactivate()
    {
        return $this->type. ' in the '. $this->location . $this->state->deactivate();
    }

    public function undoTest()
    {
        return $this->type. ' in the '. $this->location . $this->state->undo();
    }
    

    public function undo()
    {
        $response = $this->undoTest();
        $findMe = 'cant undo';

        $here = strpos($response, $findMe);

        if($here)
        {
            return 'cant undo';
        }
        return $response;
    }
}