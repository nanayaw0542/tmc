<?php 

/**
 * main controller class
 */
class Controller
{
	
	public function view($view, $data = array())
	{
		extract($data);
		if (file_exists("../private/views/" . $view . "_view.php")) 
		{
			require("../private/views/" . $view . "_view.php");
		} else{
			require("../private/views/404_view.php");
		}
	}

	 public function load_model($model)
	{
		if (file_exists("../private/models/" .ucfirst($model). ".php")) {
			require ("../private/models/" .ucfirst($model). ".php");
			return $model = new $model();
		}
		return false;
	}

	public function redirect($link)
	{
		header("Location: ". ROOT . "/".trim($link,"/"));
		die;
	}
}