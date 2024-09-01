<?php

/**
 * Class Edit Controller
 */
class editattendance extends Controller
{
	
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$ministry = $db->query("select * from ministry order by ministryname asc");
		$members = $db->query("select * from members order by fullname asc");
		$services = $db->query("select * from services where status = 'active' order by servicetype asc");
		$errors = [];

		$class = new Attendance();


		$classid = $_GET['attendanceid'] ?? null;

		$row = $class->getSpecific(['attendanceid'=>$classid]);


		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$_POST['updateddate'] = date("Y-m-d H:i:s");


			$errors = $class->validate($_POST, $row['AttendanceId']);

			if (empty($errors)) {

				if(empty($_POST['ministryname'])){
				unset($_POST['ministryname']);
			}

				$class->updateattendance($row['AttendanceId'],$_POST);

				// authenticate($_POST);

				redirect("editattendance&attendanceid=$classid");			
			}
			
		}

		if(Auth::access_level('super_admin') || ($row && $row['UserId'] == Auth::get('UserId')))
		{
			require viewsPath('attendance/editattendance');
		}

		else if(Auth::access_level('admin'))
		{
			require viewsPath('attendance/editattendance');
		}

		else
		{
			Auth::setMessage("Only Admins can edit ministry");
			require viewsPath('auth/denied');
		}

	}
}


