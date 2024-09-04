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

	    $query  = "select count(attendanceid) as totals from attendance where serviceid ='SER2409247'";
	    $total = $db->query($query);
	    $totalbothservice = $total[0]["totals"];

		$attendance = $db->query("select * from attendance order by attendancestatus asc");

		// getting data based on date
		$startdate = $_GET['startdate'] ?? null;
		$enddate = $_GET['enddate'] ?? null;

		// $salesClass = new Sales();

		// $limit = $_GET['limit'] ?? 10;
		// $limit = (int)$limit;
		// $limit = $limit < 1 ? 10 : $limit;

		$query = "select * from attendance order by attendanceid asc";

		// get today's sales total
		$year = date("Y");
		$month = date("m");
		$day = date("d");

		// $query_total = "SELECT sum(total) as totals FROM sales WHERE day(addeddate) = $day && month(addeddate) = $month && year(addeddate) = $year";

		// if both startdate and enddat has data
		if($startdate && $enddate)
		{
			$styear = date("Y",strtotime($startdate));
			$stmonth = date("m",strtotime($startdate));
			$stday = date("d",strtotime($startdate));

			$endyear = date("Y",strtotime($enddate));
			$endmonth = date("m",strtotime($enddate));
			$endday = date("d",strtotime($enddate));

			$query = "select * from attendance where (year(addeddate) >= '$styear' && month(addeddate) >= '$stmonth' && day(addeddate) >= '$stday') && (year(addeddate) <= '$endyear' && month(addeddate) <= '$endmonth' && day(addeddate) <= '$endday')";

			// $query_total = "select sum(total) as totals from sales where (year(addeddate) >= '$styear' && month(addeddate) >= '$stmonth' && day(addeddate) >= '$stday') && (year(addeddate) <= '$endyear' && month(addeddate) <= '$endmonth' && day(addeddate) <= '$endday')";

		}else
		// if only startdate has data
		if($startdate && !$enddate)
		{
			$styear = date("Y",strtotime($startdate));
			$stmonth = date("m",strtotime($startdate));
			$stday = date("d",strtotime($startdate));

			$query = "select * from attendance where (year(addeddate) = '$styear' && month(addeddate) = '$stmonth' && day(addeddate) = '$stday')";

			// $query_total = "select sum(total) as totals from sales where (year(addeddate) = '$styear' && month(addeddate) = '$stmonth' && day(addeddate) = '$stday')";

		}
		if(Auth::access_level('super_admin') || Auth::access_level('admin'))
		{
			require viewsPath("attendance/manageattendance");
		}

		else if(Auth::access_level('shepherd'))
		{
			require viewsPath("attendance/manageattendance");
		}

		else
		{
			Auth::setMessage("Only Admins can register users");
			require viewsPath('auth/denied');
		}
		
	}
}