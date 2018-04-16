<?php 
/**
* 
*/
class helpController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->view->title = 'Help';
		$this->view->renderTemplate('header');
		$this->view->render('help/index');
		$this->view->renderTemplate('footer');
	}

	public function other($arg = false)
	{
		require 'models/Help_Model.php';
		$model = new Help_Model();
	}
}
?>