<?php 
/**
 * 
 */
class managemembers extends Controller
{
	
	function index()
	{
		$db = new Database();

		$members = $db->query("select * from members order by fullname asc");

		require viewsPath("membership/managemembers");
	}
}