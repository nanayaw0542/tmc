<?php 

/**
 * User Main Model
 */
class User extends Model
{
	protected $table = "users";
	protected $allowed_columns = [
					'userid',
					'firstname',
					'lastname',
					'gender',
					'address',
					'dob',
					'email',
					'username',
					'password',
					'telephone1',
					'telephone2',
					'country',
					'religion',
					'role',
					'title',
					'status',
					'image',
					'addedid',
					'updatedid',
					'updateddate',
				];

// THIS FUNCTION CHECKS TO KNOW IF ALL MANDATORY FIELDS ARE FILLED
	public function validate($data, $userid = null)
	{
	$errors = [];
	
	if(empty($data['firstname']))
        {
            $errors['firstname'] = "Firstname is required";
        }

        elseif(!preg_match('/^[a-z A-Z]+$/', $data['firstname']))
        {
            $errors['firstname'] = "Only letters are allowed in Firstname";
        }

		if (empty($data['lastname']))
		 {
			$errors['lastname'] = "Lastname is required";
		}

		elseif (!preg_match('/^[a-z A-Z]+$/', $data['lastname']))
		 {
			$errors['lastname'] = "Only letters are allowed in Lastname";
		}

		//check for genders
		$genders = ['Female','Male'];
		if(empty($data['gender']) || !in_array($data['gender'], $genders))
        {
            $errors['gender'] = "Gender is not valid";
        }

        if (empty($data['dob'])) 
		{
			$errors['dob'] = "Date of Birth is required";
		}
		if (empty($data['title'])) 
		{
			$errors['title'] = "Title is required";
		}
		if (empty($data['address'])) 
		{
			$errors['address'] = "Location Address is required";
		}

		if (empty($data['email'])) 
		{
			$errors['email'] = "Email is required";
		}

		if (empty($data['telephone1'])) 
		{
			$errors['telephone1'] = "Enter at least a Telephone Number";
		}

		if (!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) 
		{
			$errors['email'] = "Email is not valid";
		}
		if (empty($data['username'])) 
		{
			$errors['username'] = "Username is required";
		}

		if(!$userid){
			if ($this->whereuser(["Username"=> $_POST['username']])) {
		$errors['username'] = "This Username already exists, please enter a new one!";
		}
		}
		else{
			if (empty($data['username'])) 
		{
			$errors['username'] = "Username is required";
		}
		}
		
		if(!$userid){		
			if (empty($data['password'])) 
			{
				$errors['password'] = "Password is required";
			}

			if (empty($data['retypepassword'])) 
			{
				$errors['retypepassword'] = "Retype Password is required";
			}

			if ($data['password'] !== $data['retypepassword']) 
			{
				$errors['retypepassword'] = "Passwords do not match, try again!!!";
			}

			if (strlen($data['password']) < 8) 
			{
				$errors['password'] = "Password must be at least 8 characters long";
			}
		}
		else
		{
			if (!empty($data['password'])) 
			{
			
				// if (empty($data['retypepassword'])) 
				// {
				// 	$errors['retypepassword'] = "Retype Password is required";
				// }

				if ($data['password'] !== $data['retypepassword']) 
				{
					$errors['retypepassword'] = "Passwords do not match, try again!!!";
				}

				else if (strlen($data['password']) < 8) 
				{
					$errors['password'] = "Password must be at least 8 characters long";
				}
			}
		}  

		$roles = ['Accountant','Admin','Super Admin','Shepherd','First Timer Shepherd'];
		if (empty($data['role']) || !in_array($data['role'], $roles))
		{
			$errors['role'] = "Role is invalid";
		}

		// CHECK IMAGE
		// $ext = strtolower(pathinfo($data['image']['name'],PATHINFO_EXTENSION));
		$max_size = 4; //mbs
		$size = $max_size * (1024 * 1024);

		if(!$userid || ($userid && !empty($data['image']))){
			
			if (empty($data['image'])) 
			{
				$errors['image'] = "User Image is required";
			}

			elseif (!($data['image']['type'] == "image/jpeg" || $data['image']['type'] == "image/png")) 
			{
				$errors['image'] = "User Image must be a valid JPEG or PNG";
			}

			elseif ($data['image']['error'] > 0) 
			{
				$errors['image'] = "Image the failed to upload. Error No.".$data['image']['error'];
			}

			elseif ($data['image']['size'] > $size) 
			{
				$errors['image'] = "The size of the image must be lower than ".$max_size."Mb";
			}
		
		}
		return $errors;
	}


function generate_filename($ext = "jpg")
	{
		return hash("sha1", rand(1000,9999999999))."_".rand(1000,9999).".".$ext;
	}

	
}