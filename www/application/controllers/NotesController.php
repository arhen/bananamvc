<?php  
/**
* 
*/
class NotesController extends Controller
{
	
	function __construct()
	{
		parent::__construct();

		//Load The Model to Use
		$this->loadModel('Notes_Model');

		// Aunthenticating users
		Auth::login(array('role' => 'owner'));
		$this->view->js = array('notes/js/note.js');
	}

	function index(){
		$this->view->noteList = $this->model->noteList();
		$this->view->title = 'Notes';
		$this->view->renderTemplate('header');
		$this->view->render('notes/index');
		$this->view->renderTemplate('footer');
	}

	function addNote(){
		$this->view->title = 'Add Note';
		$this->view->renderTemplate('header');
		$this->view->render('notes/create');
		$this->view->renderTemplate('footer');
	}

	public function editNote($noteId)
	{
		$this->view->noteList = $this->model->noteSingleList($noteId);
		$this->view->renderTemplate('header');
		$this->view->render('notes/edit');
		$this->view->renderTemplate('footer');

	}
	
	function create(){
		$data = array(
			"title" => $_POST['title'],
			"content" => $_POST['content']
			);
		$this->model->create($data);
		header("location:".URL.'notes');
	}

	
	function editSave($noteId){
		$data = array(
			"noteId" => $noteId,
			"title" => $_POST['title'],
			"content" => $_POST['content']
			);

		$this->model->edit($data);
		header("location:".URL.'notes');
	}
	
	function delete($noteId){
		$this->model->delete($noteId);
		header("location:".URL.'notes');
	}
}

?>