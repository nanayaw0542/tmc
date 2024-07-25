<?php 

/**
 * User Delete
 */
class deleteministry extends Controller
{
	
	function index()
	{
		$errors = [];

	$user = new Ministry();

	$userid = $_GET['ministryid'] ?? null;

	$row = $user->getSpecific(['ministryid' => $userid]);

	if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) 
	{
		

	// if(Auth::access_level('super_admin')||'admin' && $userid != 2415226)
	// {	
		$user->deleteministry($row['MinistryId']);

		redirect("manageministry&ministryid=$userid");
		// }
	}

	if(Auth::access_level('super_admin'))
	{
		require viewsPath('ministry/deleteministry');
	}

	else if(Auth::access_level('admin'))
	{
		require viewsPath('ministry/deleteministry');
	}

	else
	{
		Auth::setMessage("Only Admins can delete users");
		require viewsPath('ministry/denied');
	}

	// require viewsPath('auth/deleteuser');
	}
}

