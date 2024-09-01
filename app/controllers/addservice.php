<?php

/**
 * Class New Controller
 */
class addservice extends Controller
{
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");

	$errors = [];
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$class = new Service();
		$errors = $class->validate($_POST);
		if (empty($errors)) {
			$class->insert($_POST,'services');
			redirect('addservice');			
		}	
	}
	// if(Auth::access_level('super_admin'))
	// 	{
			require viewsPath('system/addservice');
		//}

		// else if(Auth::access_level('admin')|| Auth::access_level('headteacher'))
		// {
		// 	require viewsPath('class/addservice');
		// }

		// else
		// {
		// 	Auth::setMessage("Only Admins can edit users");
		// 	require viewsPath('auth/denied');
		// }
	// require viewsPath('class/addministry');
	}
}

