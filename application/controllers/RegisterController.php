<?php  
/**
* 
*/
class RegisterController extends Controller
{
	
	function __construct()
	{
		parent::__construct();

		//Load The Model to Use
		$this->loadModel('Register_Model');
	}

	function index(){
		$this->view->title = 'Register';
		$this->view->render('register/index');
	}

	function run(){
		try {
			$this->form->post('username',array("minLength"=>2,"maxLength"=>10))
			->post('password',array("minLength"=>4))
			->post('level');

			$this->form->submit();
			$data = $this->form->fetch();
			$this->view->msg = $this->model->regist($data);
			
		} catch (Exception $e) {
			$this->view->msg = $e->getMessage();
		}
		$this->index();
	}
	
}

?>