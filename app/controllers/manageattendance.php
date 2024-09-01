<?php 
/**
 * 
 */
class manageattendance extends Controller
{
	
	function index()
	{
		$db = new Database();
		$query  = "select count(attendanceid) as totals from attendance where serviceid ='SER2408110'";
	    $total = $db->query($query);
	    $totalfirstservice = $total[0]["totals"];

	    $query  = "select count(attendanceid) as totals from attendance where serviceid ='SER2408679'";
	    $total = $db->query($query);
	    $totalsecondservice = $total[0]["totals"];

		$attendance = $db->query("select * from attendance order by attendancestatus asc");

		require viewsPath("attendance/manageattendance");
	}
}