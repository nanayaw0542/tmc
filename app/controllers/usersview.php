<?php 

/**
 * BILL STUDENTS TABLE CLASS
 */
class usersview extends Controller
{
	
	function index()
	{
		// code...
		$db = new Database();

		$ks = $_POST['id'];
		$ks = trim($ks);
 
	$members = $db->query("select * from members where memberid='{$ks}'");
		
			require viewsPath('auth/usersview');
		
	}
}