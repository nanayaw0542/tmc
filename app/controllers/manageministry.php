<?php 
/**
 * 
 */
class manageministry extends Controller
{
	
	function index()
	{
		$db = new Database();

		$ministry = $db->query("select * from ministry order by ministryname asc");

		require viewsPath("ministry/manageministry");
	}
}