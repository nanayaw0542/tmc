<?php

/**
 * Class New Controller
 */
class addministry extends Controller
{
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");

	$errors = [];
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$class = new Ministry();
		$errors = $class->validate($_POST);
		if (empty($errors)) {
			$class->insert($_POST,'ministry');
			redirect('addministry');			
		}	
	}
	// if(Auth::access_level('super_admin'))
	// 	{
			require viewsPath('ministry/addministry');
		//}

		// else if(Auth::access_level('admin')|| Auth::access_level('headteacher'))
		// {
		// 	require viewsPath('class/addministry');
		// }

		// else
		// {
		// 	Auth::setMessage("Only Admins can edit users");
		// 	require viewsPath('auth/denied');
		// }
	// require viewsPath('class/addministry');
	}
}

