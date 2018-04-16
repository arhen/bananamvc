<?php  
/**
* 
*/
class DashboardController extends Controller
{
	
	function __construct()
	{
		parent::__construct();

		//Load The Model to Use
		$this->loadModel('Dashboard_Model');
		
		//Authenticating Session
		Auth::login();

		// Special Javascript Array for every Views that has it own 
		$this->view->js = array('dashboard/js/default.js');
	}

	function index(){
		$this->view->title = 'Dashboard';
		$this->view->renderTemplate('header');
		$this->view->render('dashboard/index');
		$this->view->renderTemplate('footer');
	}

	function logout(){
		Session::destroy();
		header('location: '.URL.'login');
		exit;
	}

	function xhrInsert(){
		$this->model->xhrInsert();
	}

	function xhrGetListings()
	{
		$this->model->xhrGetListings();
	}

	function xhrDeleteListing(){
		$this->model->xhrDeleteListing();
	}
	
}

?>