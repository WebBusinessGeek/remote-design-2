<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\MyStuff\CommandController;
use App\MyStuff\Remote;

class RequestController extends Controller {

	public $commandController;

	public function __construct()
	{
		$this->commandController = new CommandController();
	}

	public function createNewRemote()
	{
		return $this->commandController->createNewRemote();
	}

	public function createControllerWithObjectAndStateAndAddToRemote(Remote $remote, $type, $location, $default, $deactivate, $low = null, $high = null)
	{
		return $this->commandController->createControllerAndAddToRemote($remote, $type, $location, $default, $deactivate, $low, $high);
	}

	public function activateControllerOnRemote(Remote $remote, $numberOfController)
	{
		return $this->commandController->activateControllerOnRemote($remote, $numberOfController);
	}
}
