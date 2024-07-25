<?php

/**
 * 
 */
class Login extends Controller
{
	
	function index()
	{
		$db = new Database();
		$system = $db->query("select * from systemdata");
	$errors = [];
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$user = new User();

		
		// $arr['username'] = $_POST['username'];
		if($row = $user->where(['username'=>$_POST['username']]))
		{
			
			if ( password_verify($_POST['passwords'], $row[0]['Password'])) 
			{
				authenticate($row[0]);
				// school($rows[0]);
				redirect('home');

			}else
		{
			$errors['passwords'] = "Wrong Password, please try again!!!";
		}
		}
		else
		{
			$errors['username'] = "Wrong username, please try again!!!";
		}

	}
		
	require viewsPath('auth/login');
	}
}

