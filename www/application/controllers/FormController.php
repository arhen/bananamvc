<?php  
/**
* 
*/
class FormController extends Controller
{	
	function __construct()
	{
		parent::__construct();
		
		//Load The Model to Use
		$this->loadModel('Form_Model');

		//Authenticating Session
		Auth::login();
	}

	function index(){
		$this->view->listData = $this->model->listData();
		$this->view->title = 'Form';
		$this->view->renderTemplate('header');
		$this->view->render('form/index');
		$this->view->renderTemplate('footer');
	}

	function addData(){
		try {
			$this->form->post('name',array("minLength"=>2,"maxLength"=>10))
				->post('age',array("is_digit","minLength"=>1))
				->post('gender');

			$this->form->submit();
			$data = $this->form->fetch();
			$this->model->addDataPerson($data);
			$this->view->msg = 'Berhasil';
		} catch (Exception $e) {
			$this->view->msg = $e->getMessage();
		}
		$this->index();
	}
}

?>