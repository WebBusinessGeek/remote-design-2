<?php namespace App\Http\Controllers;

use App\MyStuff\CommandController;
use App\MyStuff\Object;
use App\MyStuff\Remote;
use App\MyStuff\Slot;
use Illuminate\Container\Container;
use Illuminate\Foundation\Application;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	$router->get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$commandController = new CommandController();
		$slot = $commandController->createControllerWithObjectAndState('light', 'kitchen', 'on', 'off');


		$remote = $commandController->createNewRemote();

		dd($remote);


	}

}
