<?php 

/**
 * CLASSES Main Model
 */
class Ministry extends Model
{
	protected $table = "ministry";
	protected $allowed_columns = [
					'ministryid',
					'ministryname',
					'ministryhead',
					'status',
					'userid',
					'titleid',
					'addedid',
					'updatedid',
					'updateddate',
				];

// THIS FUNCTION CHECKS TO KNOW IF ALL MANDATORY FIELDS ARE FILLED
	public function validate($data, $ministryid = null)
	{
	$errors = [];
	if(empty($data['ministryname']))
        {
            $errors['ministryname'] = "Ministry Name is required";
        }

		if(!$ministryid){
			if ($this->whereclass(["MinistryName"=> $_POST['ministryname']])) {
			$errors['ministryname'] = "The Ministry Name has been taken, enter a new one!";
		}
		if (empty($data['ministryname'])) 
		{
			$errors['ministryname'] = "Ministry Name is required";
		}
		}
	
		if (empty($data['ministryhead']))
		 {
			$errors['ministryhead'] = "Ministry Shepherd is required";
		}
		if (empty($data['titleid']))
		 {
			$errors['titleid'] = "Title is required";
		}
		
		return $errors;
	}


	
}