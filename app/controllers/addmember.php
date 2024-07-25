
<?php

/**
 * Sign up
 */
class addmember extends Controller
{
	
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$education = $db->query("select * from education");
		$certificate = $db->query("select * from certificate");
		$ministry = $db->query("select * from ministry");

		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$user = new Member();

			if(!empty($_FILES['image']['name']))
			{
				$_POST['image'] = $_FILES['image'];
			}

			$errors = $user->validate($_POST);

			if (empty($errors)) {
				

				$folder = "uploads/members/";

				if (!file_exists($folder)) 
				{
					mkdir($folder,0777,true);	
				}

				$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION));

				$destination = $folder . $user->generate_filename($ext);

				move_uploaded_file($_POST['image']['tmp_name'], $destination);
				
				$_POST['image'] = $destination;
				
				// $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST,'members');

				// authenticate($_POST);

				redirect('addmember');			
			}
			
		}

		// if(Auth::access_level('super_admin') || Auth::access_level('admin'))
		// {
			require viewsPath('membership/addmember');
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

