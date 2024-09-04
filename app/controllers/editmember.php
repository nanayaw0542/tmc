<?php

/**
 * User Edit controller
 */
class editmember extends Controller
{
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$education = $db->query("select * from education");
		$certificate = $db->query("select * from certificate");
		$ministry = $db->query("select * from ministry");
	$errors = [];

	$user = new Member();

	$userid = $_GET['memberid'] ?? null;

	$row = $user->getSpecific(['memberid'=>$userid]);


	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$_POST['updateddate'] = date("Y-m-d H:i:s");


		if(!empty($_FILES['image']['name']))
		{
			$_POST['image'] = $_FILES['image'];
		}

		$errors = $user->validate($_POST, $row['MemberId']);

		if (empty($errors)) {
			
			$folder = "uploads/members/";

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

			$user->updatemember($row['MemberId'],$_POST);

			// authenticate($_POST);

			redirect("editmember&memberid=$userid");			
		}
		
	}

	if(Auth::access_level('super_admin') || ($row && $row['UserId'] == Auth::get('UserId')))
	{
		require viewsPath('membership/editmember');
	}

	else if(Auth::access_level('admin'))
	{
		require viewsPath('membership/editmember');
	}
	else if(Auth::access_level('shepherd'))
	{
		require viewsPath('membership/editmember');
	}

	else
	{
		Auth::setMessage("Only Admins can edit users");
		require viewsPath('auth/denied');
	}

	// require viewsPath('auth/useredit');
	}
}


