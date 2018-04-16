<?php  
/**
* 
*/
class UsersController extends Controller
{
	
	function __construct()
	{
		parent::__construct();

		//Load The Model to Use
		$this->loadModel('Users_Model');

		// Aunthenticating users
		Auth::login(array('role' => 'owner'));

		// Special Javascript Array for every Views that has it own 
		$this->view->js = array('users/js/user-script.js');
	}

	function index(){
		$this->view->userList = $this->model->userList();
		$this->view->title = 'Users';
		$this->view->renderTemplate('header');
		$this->view->render('users/index');
		$this->view->renderTemplate('footer');
	}

	function addUser(){
		$this->view->title = 'Add User';
		$this->view->renderTemplate('header');
		$this->view->render('users/create');
		$this->view->renderTemplate('footer');

	}

	public function editUser($userId)
	{
		$this->view->user = $this->model->userSingleList($userId);
		$this->view->renderTemplate('header');
		$this->view->render('users/edit');
		$this->view->renderTemplate('footer');

	}
	
	function create(){
		$data = array();
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];

		$this->model->create($data);
		header("location:".URL.'users');
	}

	
	function editSave($userId){
		$data = array();
		$data['userId'] = $userId;
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];

		$this->model->edit($data);
		header("location:".URL.'users');
	}
	
	function delete($userId){
		$this->model->delete($userId);
		header("location:".URL.'users');
	}
}

?>