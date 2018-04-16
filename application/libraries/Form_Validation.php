<?php 
/**
* Validation class
* THIS CLASS IS REQUIRED BY FORM. SO DONT DELETE THIS
* Make ur Custom Function of validating here
*/
class Form_Validation
{
	
	function __construct()
	{
		# code...
	}

	public function minLength($data,$arg)
	{
		if (strlen($data) < $arg) {
			return "Your String Must Have Minimal $arg long";
		}
	}

	public function maxLength($data,$arg)
	{
		if (strlen($data) > $arg) {
			return "Your String can only $arg long";
		}
	}

	public function is_digit($data)
	{
		if (!ctype_digit($data)) {
			return "Your Input must be a digit";
		}
	}

	public function __call($name, $arguments)
	 {
	 	throw new Exception("$name Valdation does not exist inside of: " . __CLASS__);
	 } 
	
}
 ?>