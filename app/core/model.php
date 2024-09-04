<?php 
/**
 * Main model class
 */
class Model extends Database
{
	protected function get_allowed_columns($data)
	{
		if(!empty($this->allowed_columns)){
		foreach ($data as $key => $value) {
			// code...
			if (!in_array($key, $this->allowed_columns)) {
				// code...
				unset($data[$key]);
			}
		}
	}
		return $data;

	}

	// FUNCTION TO INSERT DATA INTO THE TABLE
	public function insert($data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// insert into tablename (column1, column2,column3) values (:value1, :value2, :value3)
		$query = "insert into $this->table";
		$query .= "(".implode(",", $keys).") values";
		$query .= "(:".implode(",:", $keys).")";

		$db = new Database;
		$db->query($query,$clean_array);
		$_SESSION['status'] = "Congratulations!";
		$_SESSION['subjectstatus'] = "Congratulations!";
		$_SESSION['studentstatus'] = "Congratulations!";
		$_SESSION['userstatus'] = "Congratulations!";
		$_SESSION['classsubjectstatus'] = "Congratulations!";
		$_SESSION['sectionstatus'] = "Congratulations!";
		$_SESSION['portfoliostatus'] = "Congratulations!";
	}
// FUNCTION TO CREATE UPDATING PRODUCT QUERY 
	public function update($ministryid,$data)
		{
			$clean_array = $this->get_allowed_columns($data,$this->table);
			$keys = array_keys($clean_array);
			// update tablename set id =:id, productname =:productname where id =:id;
			$query = "update $this->table set ";

			foreach ($keys as $column) {
				// code...
				$query .= $column ."=:".$column .",";
			}

			$query = trim($query,",");

			$query .= " where ministryid = :ministryid";
			$clean_array['ministryid'] = $ministryid;

			$db = new Database;
			$db->query($query,$clean_array);
			$_SESSION['update'] = "Congratulations!";
			
		}

		public function updateuser($userid,$data)
		{
			$clean_array = $this->get_allowed_columns($data,$this->table);
			$keys = array_keys($clean_array);
			// update tablename set id =:id, productname =:productname where id =:id;
			$query = "update $this->table set ";

			foreach ($keys as $column) {
				// code...
				$query .= $column ."=:".$column .",";
			}

			$query = trim($query,",");

			$query .= " where userid = :userid";
			$clean_array['userid'] = $userid;

			$db = new Database;
			$db->query($query,$clean_array);
			$_SESSION['updateuser'] = "Congratulations!";
		}

		public function updatemember($memberid,$data)
		{
			$clean_array = $this->get_allowed_columns($data,$this->table);
			$keys = array_keys($clean_array);
			// update tablename set id =:id, productname =:productname where id =:id;
			$query = "update $this->table set ";

			foreach ($keys as $column) {
				// code...
				$query .= $column ."=:".$column .",";
			}

			$query = trim($query,",");

			$query .= " where memberid = :memberid";
			$clean_array['memberid'] = $memberid;

			$db = new Database;
			$db->query($query,$clean_array);
			$_SESSION['updatestudent'] = "Congratulations!";
		}

		public function updateconvert($convertid,$data)
		{
			$clean_array = $this->get_allowed_columns($data,$this->table);
			$keys = array_keys($clean_array);
			// update tablename set id =:id, productname =:productname where id =:id;
			$query = "update $this->table set ";

			foreach ($keys as $column) {
				// code...
				$query .= $column ."=:".$column .",";
			}

			$query = trim($query,",");

			$query .= " where convertid = :convertid";
			$clean_array['convertid'] = $convertid;

			$db = new Database;
			$db->query($query,$clean_array);
			$_SESSION['updateclasssubject'] = "Congratulations!";
		}
	public function updateservice($serviceid,$data)
		{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}

		$query = trim($query,",");

		$query .= " where serviceid = :serviceid";
		$clean_array['serviceid'] = $serviceid;

		$db = new Database;
		$db->query($query,$clean_array);
		$_SESSION['updatesubject'] = "Congratulations!";
	}

	public function updateattendance($attendanceid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}

		$query = trim($query,",");

		$query .= " where attendanceid = :attendanceid";
		$clean_array['attendanceid'] = $attendanceid;
		$db = new Database;
		$db->query($query,$clean_array);
	}

	public function updatesection($sectionid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}
		$query = trim($query,",");

		$query .= " where sectionid = :sectionid";
		$clean_array['sectionid'] = $sectionid;
		$db = new Database;
		$db->query($query,$clean_array);
		$_SESSION['updatesection'] = "Congratulations!";
	}

	public function updatesystemdata($systemid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}
		$query = trim($query,",");

		$query .= " where systemid = :systemid";
		$clean_array['systemid'] = $systemid;
		$db = new Database;
		$db->query($query,$clean_array);
		$_SESSION['updatesection'] = "Congratulations!";
	}

	public function updateport($portid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}
		$query = trim($query,",");

		$query .= " where portfolioid = :portfolioid";
		$clean_array['portfolioid'] = $portid;
		$db = new Database;
		$db->query($query,$clean_array);
		$_SESSION['updateport'] = "Congratulations!";
	}

	public function updatepaybills($payfeeid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}
		$query = trim($query,",");

		$query .= " where paybillsid = :paybillsid";
		$clean_array['paybillsid'] = $payfeeid;
		$db = new Database;
		$db->query($query,$clean_array);
		$_SESSION['updateport'] = "Congratulations!";
	}

public function updatefeepart($feeparticularsid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}
		$query = trim($query,",");

		$query .= " where feeparticularsid = :feeparticularsid";
		$clean_array['feeparticularsid'] = $feeparticularsid;
		$db = new Database;
		$db->query($query,$clean_array);
		// $_SESSION['updateport'] = "Congratulations!";
	}

public function updateacademic($academicid,$data)
	{
		$clean_array = $this->get_allowed_columns($data,$this->table);
		$keys = array_keys($clean_array);
		// update tablename set id =:id, productname =:productname where id =:id;
		$query = "update $this->table set ";

		foreach ($keys as $column) {
			// code...
			$query .= $column ."=:".$column .",";
		}
		$query = trim($query,",");

		$query .= " where academicid = :academicid";
		$clean_array['academicid'] = $academicid;
		$db = new Database;
		$db->query($query,$clean_array);
		// $_SESSION['updateport'] = "Congratulations!";
	}



// FUNCTION TO CREATE DELETE QUERY FOR PRODUCTS
	public function delete($classid)
		{
		// delete from tablename where id =:id;
			$query = "delete from $this->table where classid = :classid limit 1";

			$clean_array['classid'] = $classid;

			$db = new Database;
			$db->query($query,$clean_array);
			$_SESSION['deleteuser'] = "Congratulations!";
			$_SESSION['deleteclass'] = "Congratulations!";
			$_SESSION['deletesubject'] = "Congratulations!";
		}

	public function deleteuser($userid)
	{
		
		// delete from tablename where id =:id;
		$query = "delete from $this->table where userid = :userid limit 1";

		$clean_array['userid'] = $userid;

		$db = new Database;
		$db->query($query,$clean_array);
	}
	
	public function deleteministry($ministryid)
	{
		
		// delete from tablename where id =:id;
		$query = "delete from $this->table where ministryid = :ministryid limit 1";

		$clean_array['ministryid'] = $ministryid;

		$db = new Database;
		$db->query($query,$clean_array);
	}
	public function deleteacademics($academicid)
	{
		
		// delete from tablename where id =:id;
		$query = "delete from $this->table where academicid = :academicid limit 1";

		$clean_array['academicid'] = $academicid;

		$db = new Database;
		$db->query($query,$clean_array);
	}

	public function deletesubject($subjectid)
	{
		
		// delete from tablename where id =:id;
		$query = "delete from $this->table where subjectid = :subjectid limit 1";

		$clean_array['subjectid'] = $subjectid;

		$db = new Database;
		$db->query($query,$clean_array);
	}
			
public function deleteclasssubject($classsubjectid)
	{
		
		// delete from tablename where id =:id;
		$query = "delete from $this->table where classsubjectid = :classsubjectid limit 1";

		$clean_array['classsubjectid'] = $classsubjectid;

		$db = new Database;
		$db->query($query,$clean_array);
	}

public function deleteteachersubject($teachersubjectid)
	{
		// delete from tablename where id =:id;
		$query = "delete from $this->table where teachersubjectid = :teachersubjectid limit 1";

		$clean_array['teachersubjectid'] = $teachersubjectid;

		$db = new Database;
		$db->query($query,$clean_array);
	}

	public function deletesection($sectionid)
	{
		// delete from tablename where id =:id;
		$query = "delete from $this->table where sectionid = :sectionid limit 1";

		$clean_array['sectionid'] = $sectionid;

		$db = new Database;
		$db->query($query,$clean_array);
	}
public function deleteport($portfolioid)
	{
		// delete from tablename where id =:id;
		$query = "delete from $this->table where portfolioid = :portfolioid limit 1";

		$clean_array['portfolioid'] = $portfolioid;

		$db = new Database;
		$db->query($query,$clean_array);
		// $_SESSION['deleteport'] = "Congratulations!";
	}
			
// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function where($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "userid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function whereclass($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "ministryid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function whereservice($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "serviceid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function wherepaybills($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "paybillsid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function whereuser($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "userid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}


// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function whereclassteacher($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "teacherid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function wheresubject($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "subjectid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function whereassign($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "teachersubjectid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function wheremember($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "memberid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function whereattendance($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "attendanceid")
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		$query .= " order by $order_column $order limit $limit offset $offset";
		
		$db = new Database;
		return $db->query($query,$data);
	}

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
		public function whereport($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "portfolioid")
		{
			// "select * from users where Username = :username && Password = :password"
			$keys = array_keys($data);

			$query = "select * from $this->table where ";

			foreach ($keys as $key)
			{
				$query .= "$key = :$key && ";
			}

			$query = trim($query, "&& ");
			$query .= " order by $order_column $order limit $limit offset $offset";
			
			$db = new Database;
			return $db->query($query,$data);
		}
		// FUNCTION TO SELECT WHERE DATA IN A TABLE
		public function wherefeeparticular($data, $limit = 10, $offset = 0, $order = "desc", $order_column = "feeparticularsid")
		{
			// "select * from users where Username = :username && Password = :password"
			$keys = array_keys($data);

			$query = "select * from $this->table where ";

			foreach ($keys as $key)
			{
				$query .= "$key = :$key && ";
			}

			$query = trim($query, "&& ");
			$query .= " order by $order_column $order limit $limit offset $offset";
			
			$db = new Database;
			return $db->query($query,$data);
		}
		

	// FUNCTION TO SELECT WHERE DATA IN A TABLE
	public function findAll($limit = 10, $offset = 0, $order = "asc", $order_column = "studentid")
	{
		// "select * from users where Username = :username && Password = :password"
		$query = "select * from $this->table order by $order_column $order limit $limit offset $offset";
		$db = new Database;
		return $db->query($query);
	}
		
	

	// FUNCTION TO SELECT A SPECIFIC DATA IN A TABLE
	public function getSpecific($data)
	{
		// "select * from users where Username = :username && Password = :password"
		$keys = array_keys($data);

		$query = "select * from $this->table where ";

		foreach ($keys as $key)
		{
			$query .= "$key = :$key && ";
		}

		$query = trim($query, "&& ");
		
		$db = new Database;
		if($res =  $db->query($query,$data))
		{
			return $res[0];
		}

		return false;
	}

	// public function getAllProduct($data
	// {
	// 	// query for overall total sales records
	// 	// $todaysdate = date('Y-m-d');
	// 	$query = "SELECT sum(CostPrice) as totals FROM products";
	// 	$today_rec = $productClass->query($query);
	// 	$costprice = ($today_rec[0]['totals']);
	// }

	
}