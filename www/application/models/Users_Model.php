<?php 
/**
* 
*/
class Users_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function userList()
	{
		return $this->db->select("SELECT userId, username, role FROM users");
	}


	public function userSingleList($userId)
	{
		return $this->db->select("SELECT * FROM users WHERE userId = :userId", array(":userId" => $userId));
	}

	public function create($data)
	{
		$this->db->insert("users",array(
			"username" => $data['username'],
			"password" => Hash::create("sha256",$data['password'],HASH_PASSWORD_KEY),
			"role" => $data['role']
		));
	}

	
	public function edit($data)
	{
		$postData = array(
			"username" => $data['username'],
			"password" => Hash::create("sha256",$data['password'],HASH_PASSWORD_KEY),
			"role" => $data['role']
		);

		$this->db->update("users",$postData,"`userId` = {$data['userId']}");

	}

	public function delete($userId)
	{
		$this->db->delete("users","`userId` = {$userId}");
	}
	
}

 ?>