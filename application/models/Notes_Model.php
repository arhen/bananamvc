<?php 
/**
* 
*/
class Notes_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function noteList()
	{
		return $this->db->select(
			"SELECT * FROM notes WHERE userId = :userId", 
			array(":userId" => Session::get('userId')));
	}


	public function noteSingleList($noteId)
	{
		return $this->db->select("SELECT * FROM notes 
			WHERE userId = :userId AND noteId = :noteId", 
			array(":userId" => Session::get('userId'),":noteId" => $noteId));
	}

	public function create($data)
	{
		$this->db->insert("notes",array(
			"title" => $data['title'],
			"userId" => Session::get('userId'),
			"content" => $data['content'],
			"date_added" => date('Y-m-d H:i:s') // use GMT aka UTC 0:00
		));
	}

	
	public function edit($data)
	{
		$postData = array(
			"noteId" => $data['noteId'],
			"title" => $data['title'],
			"content" => $data['content'],
			"date_added" => date('Y-m-d H:i:s')
		);

		$this->db->update("notes",
			$postData,
			"`noteId` = {$data['noteId']} AND `userId` = {$_SESSION['userId']}");

	}

	public function delete($noteId)
	{
		$this->db->delete("notes","`noteId` = {$noteId} AND `userId` = {$_SESSION['userId']}");
	}
	
}

 ?>