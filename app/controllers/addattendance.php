
<?php

/**
 * Sign up
 */
class addattendance extends Controller
{
	
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$education = $db->query("select * from education");
		$ministry = $db->query("select * from ministry order by ministryname asc");
		$members = $db->query("select * from members order by fullname asc");

		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$user = new Member();


			$errors = $user->validate($_POST);

			if (empty($errors)) {
				

				$user->insert($_POST,'attendance');


				redirect('addattendance');			
			}
			
		}

		// if(Auth::access_level('super_admin') || Auth::access_level('admin'))
		// {
			require viewsPath('attendance/addattendance');
		// }

		// else if(Auth::access_level('admin'))
		// {
		// 	require viewsPath('auth/addmember');
		// }

		// else
		// {
		// 	Auth::setMessage("Only Admins can register users");
		// 	require viewsPath('auth/denied');
		// }

	}
}

