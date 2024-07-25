
<?php 

require "../app/core/config.php";
require "../app/core/functions.php";
require "../app/core/database.php";
require "../app/core/controller.php";
require "../app/core/model.php";
require "../app/core/app.php";


spl_autoload_register('my_function');

function my_function($classname)
{
	$filename = "../app/models/" .ucfirst($classname) .".php";
	if (file_exists($filename)) {
		// code...
		require $filename;
	}
	
}

// spl_autoload_register(function($class_name)
// {
// 	require "../app/models/". ucfirst($class_name) . ".php";
// });