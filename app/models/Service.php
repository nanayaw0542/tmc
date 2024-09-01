<?php 

/**
 * CLASSES Main Model
 */
class Service extends Model
{
	protected $table = "services";
	protected $allowed_columns = [
					'serviceid',
					'servicetype',
					'duration',
					'status',
					'userid',
					// 'titleid',
					'addedid',
					'updatedid',
					'updateddate',
				];

// THIS FUNCTION CHECKS TO KNOW IF ALL MANDATORY FIELDS ARE FILLED
	public function validate($data, $serviceid = null)
	{
	$errors = [];
	if(empty($data['servicetype']))
        {
            $errors['servicetype'] = "Service Type is required";
        }

		if(!$serviceid){
			if ($this->whereservice(["ServiceType"=> $_POST['servicetype']])) {
			$errors['servicetype'] = "The Service Type has been taken, select a new one!";
		}
		if (empty($data['servicetype'])) 
		{
			$errors['servicetype'] = "Service Type is required";
		}
		}
	
		// if (empty($data['ministryhead']))
		//  {
		// 	$errors['ministryhead'] = "Ministry Shepherd is required";
		// }
		if (empty($data['duration']))
		 {
			$errors['duration'] = "Duration is required";
		}
		
		return $errors;
	}


	
}