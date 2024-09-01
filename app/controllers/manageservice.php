<?php 
/**
 * 
 */
class manageservice extends Controller
{
	
	function index()
	{
		$db = new Database();

		$ministry = $db->query("select * from services order by servicetype asc");

		require viewsPath("system/manageservice");
	}
}