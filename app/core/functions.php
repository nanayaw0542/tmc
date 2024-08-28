<?php 

// function show($data)
// {
// 	echo "<pre>";
// 	print_r($data);
// 	echo "/pre";
// }

function viewsPath($view, $data=array())
{
	extract($data);
	if(file_exists("../app/views/" . $view . ".view.php"))
	{
	return "../app/views/" . $view . ".view.php";
	}
	else
	{
	require ("../app/views/404.view.php");
	}
}

function esc($str)
{
	return htmlspecialchars($str);
}

function redirect($page)
{
	header("Location: ". ROOT . "/".trim($page,"/"));
	die;
}

// THIS FUNCTION STICKS DATA ENTERED IN A FIELD
function set_value($key, $default = "")
{
	if (!empty($_POST[$key])) {
		return $_POST[$key];
	}

	return $default;
}

function get_select($key,$value)
{
	if (isset($_POST[$key])) {
		// code...
		if ($_POST[$key] == $value)
		{
			return "selected";
		}
	}
	return "";
}

function authenticate($row)
{
	$_SESSION['USER'] = $row;
}

function school($row)
{
	$_SESSION['SCHOOL'] = $rows;
}

function auth($column)
{
	if (!empty($_SESSION['USER'][$column])) 
	{
		// code...
		return $_SESSION['USER'][$column];
	}

	return "Unknown";
	
}

function crop($filename, $size = 400, $type = "product")
{
	$ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));

	// $cropped_file = str_replace(".".$ext, "_cropped.".$ext, $filename);
	$cropped_file = preg_replace("/\.$ext$/", "_cropped.".$ext, $filename);

	// if cropped file already exists
	if(file_exists($cropped_file))
	{
		return $cropped_file;
	}

	//if file to be cropped does not exist
	if(!file_exists($filename))
	{
		if($type == "Male")
		{
			return 'assets/images/male-user.png';
		}
		else if($type == "Female")
		{
			return 'assets/images/female-user.png';
		}

		else
		{
			return 'assets/images/no-image.png';
		}
	}

	
// switch cases to create image resources
	switch ($ext) {
		case 'jpg':			
		case 'jpeg':
		$src_image = imagecreatefromjpeg($filename);
		break;

		case 'gif':
		$src_image = imagecreatefromgif($filename);
			break;

		case 'png':
		$src_image = imagecreatefrompng($filename);
			break;
		
		default:
		return $filename;
			break;
	}

	// assign values variables
	$dst_x = 0;
	$dst_y = 0;
	$dst_w = (int)$size;
	$dst_h = (int)$size;

	$original_width = imagesx($src_image);
	$original_height = imagesy($src_image);

	if($original_width < $original_height)
	{
		$src_x = 0;
		$src_y = ($original_height - $original_width) / 2;
		$src_w = $original_width;
		$src_h = $original_width;
	}
	else
	{
		$src_y = 0;
		$src_x = ($original_width- $original_height) / 2;
		$src_w = $original_height;
		$src_h = $original_height;
	}

	// setting cropping parameters
	$dst_image = imagecreatetruecolor((int)$size, (int)$size);

	imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
// save final image resource
	switch ($ext) {
		case 'jpg':			
		case 'jpeg':
		imagejpeg($dst_image,$cropped_file,90);
		break;

		case 'gif':
		imagegif($dst_image,$cropped_file);
			break;

		case 'png':
		imagepng($dst_image,$cropped_file);
			break;
		
		default:
		return $filename;
			break;
	}

	imagedestroy($dst_image);
	imagedestroy($src_image);

	return $cropped_file;
}

function get_receipt_no()
{
	$num = 1;

	$db = new Database();
	$rows = $db->query("select MemberId from members order by MemberId desc limit 1");

	if(is_array($rows))
	{
		$num = (int)$rows[0]['MemberId'] + 1;
	}

	return $num;
}

function get_date($date)
{
	return date("jS M, Y",strtotime($date));
}

function get_user_by_id($userid)
{
	$user = new User();
	return $user->getSpecific(['userid' =>$userid]);
}


function get_ministry_by_id($ministryid)
{
	$ministry = new Ministry();
	return $ministry->getSpecific(['ministryid' =>$ministryid]);
}

function get_title_by_id($titleid)
{
	$subject = new Title();
	return $subject->getSpecific(['titleid' =>$titleid]);
}

function get_edu_by_id($educationid)
{
	$education = new Education();
	return $education->getSpecific(['educationid' =>$educationid]);
}

function get_cert_by_id($certificateid)
{
	$class = new Certificate();
	return $class->getSpecific(['certificateid' =>$certificateid]);
}
function get_system_by_id($systemid)
{
	$class = new School();
	return $class->getSpecific(['systemid' =>$systemid]);
}

function get_section_by_id($sectionid)
{
	$class = new Section();
	return $class->getSpecific(['sectionid' =>$sectionid]);
}

function get_port_by_id($portfolioid)
{
	$port = new Portfolio();
	return $port->getSpecific(['portfolioid' =>$portfolioid]);
}

function get_religion_by_id($religionid)
{
	$port = new Religion();
	return $port->getSpecific(['religionid' =>$religionid]);
}
function get_region_by_id($regionid)
{
	$port = new Region();
	return $port->getSpecific(['regionid' =>$regionid]);
}
function get_blood_by_id($bloodid)
{
	$blood = new Blood();
	return $blood->getSpecific(['bloodid' =>$bloodid]);
}
function get_feepart_by_id($feeparticularsid)
{
	$blood = new FeeParticulars();
	return $blood->getSpecific(['feeparticularsid' =>$feeparticularsid]);
}
function get_billstudent_by_id($billstudentid)
{
	$blood = new Billstudents();
	return $blood->getSpecific(['billstudentid' =>$billstudentid]);
}
function get_paybill_by_id($paybillsid)
{
	$blood = new Paybill();
	return $blood->getSpecific(['paybillsid' =>$paybillsid]);
}
function get_acasetting_by_id($academicid)
{
	$blood = new Academicsetting();
	return $blood->getSpecific(['academicid' =>$academicid]);
}

function generate_dailyrecords($records)
{
	$arr = [];

	for ($i=0; $i < 24; $i++) { 
		if(!isset($arr[$i])){
		
			$arr[$i] = 0;
		}
			foreach ($records as $row) {
				$hour = date('H',strtotime($row['AddedDate']));
				if($hour == $i){
					
						$arr[$i] = $row['Total'];
			}
		}
	}
	return $arr;
}

function generate_monthlyrecords($records)
{
	$arr = [];
	$total_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
	for ($i=1; $i <= $total_days; $i++) { 
		if(!isset($arr[$i])){
		
			$arr[$i] = 0;
		}
			foreach ($records as $row) {
				$day = date('d',strtotime($row['AddedDate']));
				if($day == $i){
					
						$arr[$i] = $row['totals'];
			}
		}
	}
	return $arr;
}

function generate_yearlyrecords($records)
{
	$arr = [];
	$months = ['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

	for ($i=1; $i <= 12; $i++) { 
		if(!isset($arr[$months[$i]])){
		
			$arr[$months[$i]] = 0;
		}
			foreach ($records as $row) {
				$month = date('m',strtotime($row['AddedDate']));
				if($month == $i){
					
						$arr[$months[$i]] = $row['totals'];
			}
		}
	}
	return $arr;
}
