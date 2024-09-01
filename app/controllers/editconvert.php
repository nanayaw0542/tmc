<?php

/**
 * User Edit controller
 */
class editconvert extends Controller
{
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$education = $db->query("select * from education");
		$certificate = $db->query("select * from certificate");
		$ministry = $db->query("select * from ministry");
		$member = $db->query("select * from members order by fullname asc");
	$errors = [];

	$user = new Converts();

	$userid = $_GET['convertid'] ?? null;

	$row = $user->getSpecific(['convertid'=>$userid]);


	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$_POST['updateddate'] = date("Y-m-d H:i:s");


		if(!empty($_FILES['image']['name']))
		{
			$_POST['image'] = $_FILES['image'];
		}

		$errors = $user->validate($_POST, $row['ConvertId']);

		if (empty($errors)) {
			
			$folder = "uploads/converts/";

			if (!file_exists($folder)) 
			{
				mkdir($folder,0777,true);	
			}
			if (!empty($_POST['image'])) 
			{

				$ext = strtolower(pathinfo($_POST['image']['name'], PATHINFO_EXTENSION));

				$destination = $folder . $user->generate_filename($ext);

				move_uploaded_file($_POST['image']['tmp_name'], $destination);
				
				$_POST['image'] = $destination;

					// Delete the old image from the upload folder
				if (file_exists($row['image'])) 
				{
					// code...
					unlink($row['image']);
				}
			}

			if(empty($_POST['telephone1'])){
				unset($_POST['telephone1']);
			}

			$user->updateconvert($row['ConvertId'],$_POST);

			// authenticate($_POST);

			redirect("editconvert&convertid=$userid");			
		}
		
	}

	if(Auth::access_level('super_admin') || ($row && $row['UserId'] == Auth::get('UserId')))
	{
		require viewsPath('membership/editconvert');
	}

	else if(Auth::access_level('admin'))
	{
		require viewsPath('membership/editconvert');
	}
	else if(Auth::access_level('headteacher'))
	{
		require viewsPath('membership/editconvert');
	}

	else
	{
		Auth::setMessage("Only Admins can edit users");
		require viewsPath('auth/denied');
	}

	// require viewsPath('auth/useredit');
	}
}


