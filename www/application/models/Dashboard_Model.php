<?php 
/**
* 
*/
class Dashboard_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function xhrInsert()
	{
		$text =  $_POST['text'];
		$this->db->insert("data",array("text" => $text));
		$data = array('dataId' =>  $this->db->lastInsertId(), 'text' => $text);
		echo json_encode($data);
	}

	public function xhrGetListings()
	{
		$data = $this->db->select("SELECT * FROM data");
		echo json_encode($data);

	}

	public function xhrDeleteListing()
	{
		$dataId = (int) $_POST['dataId'];
		$this->db->delete("data","dataId = '$dataId'");
	}
	
}

 ?>