<?php 

/**
 * User Delete
 */
class deleteuser extends Controller
{
	
	function index()
	{
		$errors = [];

	$user = new User();

	$userid = $_GET['userid'] ?? null;

	$row = $user->getSpecific(['userid' => $userid]);

	if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) 
	{
		

	// if(Auth::access_level('super_admin')||'admin' && $userid != 2415226)
	// {	
		$user->deleteuser($row['UserId']);

		redirect("users&userid=$userid");
		// }
	}

	if(Auth::access_level('super_admin') || Auth::access_level('headteacher'))
	{
		require viewsPath('auth/deleteuser');
	}

	else if(Auth::access_level('admin'))
	{
		require viewsPath('auth/deleteuser');
	}

	else
	{
		Auth::setMessage("Only Admins can delete users");
		require viewsPath('auth/denied');
	}

	// require viewsPath('auth/deleteuser');
	}
}

