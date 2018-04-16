<?php 

/**
 * Login Model CLass
 */
 class Form_model extends Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function addDataPerson($data){
		$this->db->insert("person",array(
			"name" => $data['name'],
			"age" => $data['age'],
			"gender" => $data['gender']
		));
 	}

 	public function listData(){
 		return $this->db->select("SELECT * FROM person");
 	}

 } 
 ?>