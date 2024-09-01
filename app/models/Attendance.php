<?php 

/**
 * User Main Model
 */
class Attendance extends Model
{
	protected $table = "attendance";
	protected $allowed_columns = [
					'attendanceid',
					'serviceid',
					'ministryid',
					'memberid',
					'attendancestatus',
					'addedid',
					'userid',
					'titleid',
					'updatedid',
					'updateddate',
				];

// THIS FUNCTION CHECKS TO KNOW IF ALL MANDATORY FIELDS ARE FILLED
	public function validate($data, $attendanceid = null)
	{
	$errors = [];

		//check for genders
		$attendances = ['Present','Absent'];
		if(empty($data['attendancestatus']) || !in_array($data['attendancestatus'], $attendances))
        {
            $errors['attendancestatus'] = "Attendance Status is not valid";
        }
		if (empty($data['serviceid'])) 
		{
			$errors['serviceid'] = "Please select a Service";
		}
		if (empty($data['memberid'])) 
		{
			$errors['memberid'] = "Please select a member";
		}

		if(!$attendanceid){
			if ($this->whereattendance(["MemberId"=> $_POST['memberid']])) {
		$errors['memberid'] = "This Member's attendance has already been recorded', please select a new one!";
		}
		}elseif (empty($data['memberid'])) 
		{
			$errors['memberid'] = "Please select a member";
		}
		
		return $errors;
	}
	
}