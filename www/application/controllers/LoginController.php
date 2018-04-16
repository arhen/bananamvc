<?php  
/**
* 
*/
class LoginController extends Controller
{
	
	function __construct()
	{
		parent::__construct();

		//Load The Model to Use
		$this->loadModel('Login_Model');
	}

	function index(){
		$this->view->title = 'Login';
		$this->view->render('login/index');
	}

	function run(){
		$data = $this->model->run();
		if ($data == TRUE) {
			Session::init();
			Session::set('userId', $data['userId']);
			Session::set('role', $data['role']);
			Session::set('loggedIn',true);

			header('location: '.URL.'dashboard');
		}else{
			$this->view->msg = 'Username/Password Invalid! Please Try Again';
			$this->index();
		}
		
	}
	
}

?>