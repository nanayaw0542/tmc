
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
		$query  = "select count(memberid) as totals from members where status ='Active'";
	    $total = $db->query($query);
	    $totalmembers = $total[0]["totals"];

	    $query  = "select count(convertid) as totals from newconverts where status ='Active'";
	    $total = $db->query($query);
	    $totalconverts = $total[0]["totals"];

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




	 
