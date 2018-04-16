<?php 
	/**
	* 
	*/
	class View
	{
		function __construct()
		{	
		}
		public function render($name){
			require APPPATH.'views/' . $name . '.php';		
		}

		public function renderTemplate($template){
			require APPPATH.'views/templates/' . $template . '.php';
		}
	}
	?>