<?php 

/**
 * BILL STUDENTS TABLE CLASS
 */
class ministryview extends Controller
{
	
	function index()
	{
		// code...
		$db = new Database();

		$ks = $_POST['ids'];
		$ks = trim($ks);
 
	$members = $db->query("select * from members where ministryid='{$ks}' order by fullname");
		
			require viewsPath('attendance/ministryview');
		
	}
}