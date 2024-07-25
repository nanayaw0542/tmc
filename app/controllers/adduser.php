
<?php

/**
 * Sign up
 */
class adduser extends Controller
{
	
	function index()
	{
		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$user = new User();

			if(!empty($_FILES['image']['name']))
			{
				$_POST['image'] = $_FILES['image'];
			}

			$errors = $user->validate($_POST);

			if (empty($errors)) {
				

				$folder = "uploads/users/";

				if (!file_exists($folder)) 
				{
					mkdir($folder,0777,true);	
				}

				$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION));

				$destination = $folder . $user->generate_filename($ext);

				move_uploaded_file($_POST['image']['tmp_name'], $destination);
				
				$_POST['image'] = $destination;
				
				$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST,'users');

				// authenticate($_POST);

				redirect('adduser');			
			}
			
		}

		// if(Auth::access_level('super_admin') || Auth::access_level('admin'))
		// {
			require viewsPath('auth/adduser');
		// }

		// else if(Auth::access_level('admin'))
		// {
		// 	require viewsPath('auth/adduser');
		// }

		// else
		// {
		// 	Auth::setMessage("Only Admins can register users");
		// 	require viewsPath('auth/denied');
		// }

	}
}

