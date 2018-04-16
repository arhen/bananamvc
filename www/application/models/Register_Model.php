<?php 

/**
 * Login Model CLass
 */
class Register_Model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function regist($data){
		$check = $this->db->select("SELECT username FROM users where username = :username",array(':username'=>$data['username']));
		if (count($check)>0) {
			return "Username has been used";
		}else{
			$register = $this->db->insert("users",array(
				"username" => $data['username'],
				"password" => Hash::create("sha256",$data['password'],HASH_PASSWORD_KEY))
			);
			return "Register Successfully!";
		}

	}
} 
?>