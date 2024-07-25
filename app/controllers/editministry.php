<?php

/**
 * Class Edit Controller
 */
class editministry extends Controller
{
	
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$errors = [];

		$class = new Ministry();


		$classid = $_GET['ministryid'] ?? null;

		$row = $class->getSpecific(['ministryid'=>$classid]);


		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			
			$_POST['updateddate'] = date("Y-m-d H:i:s");


			$errors = $class->validate($_POST, $row['MinistryId']);

			if (empty($errors)) {

				if(empty($_POST['ministryname'])){
				unset($_POST['ministryname']);
			}

				$class->update($row['MinistryId'],$_POST);

				// authenticate($_POST);

				redirect("editministry&ministryid=$classid");			
			}
			
		}

		if(Auth::access_level('super_admin') || ($row && $row['UserId'] == Auth::get('UserId')))
		{
			require viewsPath('ministry/editministry');
		}

		else if(Auth::access_level('admin'))
		{
			require viewsPath('ministry/editministry');
		}

		else
		{
			Auth::setMessage("Only Admins can edit ministry");
			require viewsPath('auth/denied');
		}

	}
}


