<?php 

/**
 * BILL STUDENTS TABLE CLASS
 */
class tblmember extends Controller
{
	
	function index()
	{
		// code...
		$db = new Database();

		$ks = $_POST['id'];
		$ks = trim($ks);
 
	$members = $db->query("select * from members where memberid='{$ks}'");
		
			require viewsPath('attendance/tblmember');
		
	}
}