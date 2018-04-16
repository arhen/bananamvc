<?php  
/**
* 
*/
class indexController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function index(){
		$this->view->title = 'Home';
		$this->view->renderTemplate('header');
		$this->view->render('index/index');
		$this->view->renderTemplate('footer');
	}

	
}

?>