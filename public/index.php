
<?php 

session_start();

define("ABSPATH", true);


require "../app/core/init.php";


// $controller = $_GET[''] ?? "home";
// $controller = strtolower($controller);

// if(file_exists("../app/controllers/".$controller . ".php"))
// {
//   require "../app/controllers/".$controller . ".php";
// }
// else
// {
//   echo "controller not found";
// }


$app = new App();
