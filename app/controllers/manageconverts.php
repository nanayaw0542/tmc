<?php 
/**
 * 
 */
class manageconverts extends Controller
{
	
	function index()
	{
		$db = new Database();

		$members = $db->query("select * from newconverts order by fullname asc");

		require viewsPath("membership/manageconverts");
	}
}