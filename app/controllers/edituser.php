<?php

/**
 * User Edit controller
 */
class edituser extends Controller
{
	
	function index()
	{
	$errors = [];

	$user = new User();


	$userid = $_GET['userid'] ?? null;

	$row = $user->getSpecific(['userid'=>$userid]);


	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
		$_POST['updateddate'] = date("Y-m-d H:i:s");


		if(!empty($_FILES['image']['name']))
		{
			$_POST['image'] = $_FILES['image'];
		}

		$errors = $user->validate($_POST, $row['UserId']);

		if (empty($errors)) {
			
			$folder = "uploads/users/";

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
			
			if(empty($_POST['password'])){
				unset($_POST['password']);
			}
			else
			{
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			}

			if(empty($_POST['username'])){
				unset($_POST['username']);
			}

			$user->updateuser($row['UserId'],$_POST);

			// authenticate($_POST);

			redirect("edituser&userid=$userid");			
		}
		
	}

	if(Auth::access_level('super_admin') || ($row && $row['UserId'] == Auth::get('UserId')))
	{
		require viewsPath('auth/edituser');
	}

	else if(Auth::access_level('admin'))
	{
		require viewsPath('auth/edituser');
	}
	else if(Auth::access_level('headteacher'))
	{
		require viewsPath('auth/edituser');
	}

	else
	{
		Auth::setMessage("Only Admins can edit users");
		require viewsPath('auth/denied');
	}

	// require viewsPath('auth/useredit');
	}
}


