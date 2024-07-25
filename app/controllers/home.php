
<?php

/**
 * 
 */
defined("ABSPATH") ? "":die();
class Home extends Controller
{

	
	function index()
	{
		$db = new Database();
		

		if(!Auth::logged_in())
	 {
	 	redirect('login');
		// require viewsPath('login');
	}
	else
	{	
		require viewsPath('home');
	}
	}
}




	 
