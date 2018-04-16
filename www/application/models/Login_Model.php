<?php 

/**
 * Login Model CLass
 */
 class Login_Model extends Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function run(){
 		$username = $_POST['username'];
 		$password = $_POST['password'];

 		$query = $this->db->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
 		$query->bindValue(1, $username);
	 	$query->bindValue(2, Hash::create("sha256",$password,HASH_PASSWORD_KEY));

		try {
			$query->execute();
			return $query->fetch();
		} catch(PDOException $e) {
			die($e->getMessage());
		}

 	}
 } 
 ?>