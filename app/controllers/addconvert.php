
<?php

/**
 * Sign up
 */
class addconvert extends Controller
{
	function index()
	{
		$db = new Database();
		$titles = $db->query("select * from title");
		$education = $db->query("select * from education");
		$certificate = $db->query("select * from certificate");
		// $ministry = $db->query("select * from ministry order by ministryname");
		$member = $db->query("select * from members where status='active' order by fullname asc");

		$errors = [];
		if ($_SERVER['REQUEST_METHOD'] == "POST") {


			$user = new Converts();

			if(!empty($_FILES['image']['name']))
			{
				$_POST['image'] = $_FILES['image'];
			}

			$errors = $user->validate($_POST);

			if (empty($errors)) {
				

				$folder = "uploads/converts/";

				if (!file_exists($folder)) 
				{
					mkdir($folder,0777,true);	
				}

				$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION));

				$destination = $folder . $user->generate_filename($ext);

				move_uploaded_file($_POST['image']['tmp_name'], $destination);
				
				$_POST['image'] = $destination;
				
				// $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$user->insert($_POST,'newconverts');

				// authenticate($_POST);

				redirect('addconvert');			
			}
			
		}
		 if(Auth::access_level('super_admin') || Auth::access_level('admin') || Auth::access_level('shepherd'))
		 {
			require viewsPath('membership/addconvert');
		 }

		else if(Auth::access_level('admin'))
		{
			require viewsPath('membership/addconvert');
		}

		else
		{
			Auth::setMessage("Only Admins can register users");
			require viewsPath('auth/denied');
		}

	}
}

