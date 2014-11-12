<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AppController extends Controller {


	/**
	 * @Get('/')
     */
	public function showHome()
	{
		return view('app.master');
	}

	public function test()
	{
		return view('app.test');
	}

}
