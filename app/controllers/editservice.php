<?php

/**
 * Class Edit Controller
 */
class editservice extends Controller
{
	
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$errors = [];

		$class = new Service();


		$classid = $_GET['serviceid'] ?? null;

		$row = $class->getSpecific(['serviceid'=>$classid]);


		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$_POST['updateddate'] = date("Y-m-d H:i:s");


			$errors = $class->validate($_POST, $row['ServiceId']);

			if (empty($errors)) {

				if(empty($_POST['servicetype'])){
				unset($_POST['servicetype']);
			}

				$class->updateservice($row['ServiceId'],$_POST);

				// authenticate($_POST);

				redirect("editservice&serviceid=$classid");			
			}
			
		}

		if(Auth::access_level('super_admin') || ($row && $row['UserId'] == Auth::get('UserId')))
		{
			require viewsPath('system/editservice');
		}

		else if(Auth::access_level('admin'))
		{
			require viewsPath('system/editservice');
		}

		else
		{
			Auth::setMessage("Only Admins can edit system");
			require viewsPath('auth/denied');
		}

	}
}


