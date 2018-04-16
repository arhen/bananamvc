<?php 
class App
{
    private $_modelPath = APPPATH.'models/';
    private $_viewPath = APPPATH.'views/';
    private $_controllerPath = APPPATH.'controllers/';
    private $_defaultController = 'IndexController';

	// Call this function and Here We Go.
	public function init()
	{
		
		//Make sure The Path without traling slash in the beginning
        $this->_modelPath = rtrim($this->_modelPath,'/') . '/';
        $this->_viewPath = rtrim($this->_viewPath,'/') . '/';
        $this->_controllerPath = rtrim($this->_controllerPath,'/') . '/';

        // Add .php strings
		$this->_defaultController = $this->_defaultController . '.php';
        // call Router
		new Router($this->_modelPath,$this->_viewPath,$this->_controllerPath, $this->_defaultController);
	}

	/**
	 * [OPTIONAL] : Set Custom Models Folder Path
	 * @param [strings] $path [models Path]
	 */
	public function setModelPath($path)
	{
		$this->_modelPath = $path;
	}

	/**
	 * [OPTIONAL] : Set Custom Views Folder Path
	 * @param [strings] $path [views Path]
	 */
	public function setViewPath($path)
	{
		$this->_modelPath = $path;
	}

	/**
	 * [OPTIONAL] : Set Custom Controllers Folder Path
	 * @param [strings] $path [controlles Path]
	 */
	public function setControllerPath($path){
		$this->_controllerPath = $path;
	}

	/**
	 * [OPTIONAL] : Set Custom Default File Controller
	 * @param [strings] $name [File Name]
	 */
	public function setDefaultController($name)
	{
		$this->_defaultController = $name;
	}
}
?>