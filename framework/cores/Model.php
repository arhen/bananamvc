<?php 
/**
* 
*/
class Model
{
	protected $DB;
	function __construct()
	{
		$DB = array(
			'type' => DB_TYPE,
			'host' => DB_HOST,
			'name' => DB_NAME,
			'user' => DB_USER,
			'pass' => DB_PASS
		);

		$this->db = new Database($DB);
		
	}
}

 ?>