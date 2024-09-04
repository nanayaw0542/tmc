<?php 

/**
 * Authentication class
 */
class Auth
{
	
	public static function get($column)
	{
		if (!empty($_SESSION['USER'][$column])) 
		{
			return $_SESSION['USER'][$column];
		}
		return "Unknown";	
	}


	public static function logged_in()
	{
		
	if (!empty($_SESSION['USER'])) 
		{
			$db = new Database();
			if($check = $db->query("select * from users where username = :username limit 1",['username'=>$_SESSION['USER']['Username']]))
			{
				return true;
			}
		}
		return false;
	}

	public static function access_level($role)
	{
		$access_level['super_admin'] 				= ['Super Admin'];
		$access_level['admin'] 						= ['Super Admin','Admin'];
		$access_level['shepherd']					= ['Super Admin','Admin','Shepherd'];
		$access_level['accountant'] 				= ['Super Admin','Admin','Accountant'];
		$access_level['firsttimershepherd'] 		= ['Super Admin','Admin','Accountant', 'Shepherd','First Timer Shepherd'];

		$myRole = self::get('Role');
		if(in_array($myRole, $access_level[$role]))
		{
			return true;
		}
		return false;
	}

	public static function setMessage($message)
	{
		$_SESSION['MESSAGE'] = $message;
	}

	public static function getMessage()
	{
		if(!empty($_SESSION['MESSAGE']))
		{
			$message = $_SESSION['MESSAGE'];

			unset($_SESSION['MESSAGE']);
			return $message;

		}
	}

	
}