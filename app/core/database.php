<?php 

/**
 * Database Class
 */
class Database
{
	// FUNCTION TO CONNECT TO THE DATABASE
	private function db_connect()
	{
		$DBHOST = "localhost";
		$DBNAME = "cms_db";
		$DBUSER = "root";
		$DBPASS = "";
		$DBDRIVER = "mysql";

	try {

		$con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME",$DBUSER,$DBPASS);
		
	} catch (PDOException $e) {
		echo $e ->getMessage();
	}
		
		return $con;
	}


public function query($query, $data = array())
{
	$con = $this->db_connect();
	$stmt = $con->prepare($query);
	$check = $stmt->execute($data);

	if ($check) {
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if (is_array($result) && count($result) > 0) {

			return $result;
		}
	}
	return false;
}
}
