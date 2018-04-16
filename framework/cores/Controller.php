<?php 
	/**
	* 
	*/
	class Controller
	{
		/**
		 * @var _helpClass - for Load the helpers Modul
		 */
		private $_helpClass = NULL;

		/**
		 * Load Automatically
		 */
		function __construct()
		{
			// Instance an object of class
			$this->view = new View();
			$this->form = new Forms();
		}
		
		function loadModel($name, $path = APPPATH.'models/')
		{
			// Load the models Names
			$path = $path . $name . '.php';

			if (file_exists($path))
			{
				require $path;
				// instance Object of the Model Class
				$modelName = $name;
				$this->model = new $modelName();
			}
		}

		function loadLibrary($name,$path = APPPATH.'libraries/')
		{
			$path = $path . $name . '.php';
			if (file_exists($path)){
				require $path;
				$libName = $name;
				$this->lib = new $libName();
			}
		}
	}

 ?>