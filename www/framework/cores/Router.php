<?php 

/**
* @param $_url  : for saved the url in the address bar that rewriting by .htaccess
* @param $_controller : Saved the controller names.
*/
class Router
{
    private $_url = NULL;
    private $_controller = NULL;
    private $_modelPath = NULL;
    private $_viewPath = NULL;
    private $_controllerPath = NULL;
    private $_defaultFilePath = NULL;

    /**
     * __CONSTRUCT : THIS FUNCTION WILL BE LOADED FIRST IF THIS CLASS HAS BEEN CALLED
     */

    public function __construct($model,$view,$controller, $defaultController)
    {
        // Sets Protected $_url
        $this->_getUrl();

        //Set the private Variable
        $this->_modelPath = $model;
        $this->_viewPath = $view;
        $this->_controllerPath = $controller;
        $this->_defaultFilePath = $defaultController;

		//if nothing page or in the main page, call default controller
        // ex : http://localhost/mvc/
        if (empty($this->_url[0])) 
        {
            // Load Default Controller;
            $this->_loadDefaultController();
            return false;
        }
        else if ($this->_url[0]=='index') 
        {
            // Routing back to default URL if url[0]==Index
            // ex : http:/localhost/mvc/index
            $this->_loadDefaultController();
            return false;
        }

        //Load Existing Controller
        $this->_loadExistingController();

        // Load Controller Method
        $this->_callControllerMethod();
    }

    /**
     * _getUrl : function to get The Url in the address bar
     */
    private function _getUrl()
    {
        // Explode url to the array Variabels (url)
        $url = isset($_GET['url']) ? $_GET['url'] : null;;
        $url = rtrim($url, '/');
        $url = filter_var($url,FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * [_loadDefaultController function]
     */
    private function _loadDefaultController()
    {
        require $this->_controllerPath . $this->_defaultFilePath;
        $this->_controller = new IndexController();
        $this->_controller->index();
    }

    /**
     * [_loadExistingController function]
     * @return [boolean|strings]
     */
    private function _loadExistingController()
    {
        //Uppercase the first letter of String. this is Neccessary based on your Names Style in Controller
        //Sometimes, the first Letter is Uppercase. 
        //Ex: url[0] is home but your controllers name's is HomeController
        //so you need to uppercase first letter of home
        $this->_url[0] = ucfirst($this->_url[0]);

        // Checking File requirement in the Folder Controller are exist
        $file = $this->_controllerPath . $this->_url[0] . 'Controller.php';
        if (file_exists($file)) 
        {
            //if there are files, require it!
            require $file;

            // Inttialize my Controller Names Class.
            $name_control = $this->_url[0].'Controller';

            // Instance an object controller based on $_url[0];
            $this->_controller = new $name_control;
            
            //Load Models Instanly. Actually, if you make a moduls, 
            //you must create Model,Controller,and views of that Moduls
            //So, Maybe we can put this in the $this->_url[0] controller
            //as we want bcauze not every Moduls need an access to the databses or Model Files
            // $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        }
        else
        {
            // Return the error page if doesnt controller exist
            $this->_404error();
        }
    }

    /**
     * [_callControllerMethod Function]
     * @return [boolean|strings]
     */
    private function _callControllerMethod()
    {
        // For Now, the wep apps can handle until 5 parameter passed, you can add more
        // ex : http://localhost/controller/method/(param)/(param)/(param)
        // url[0] = Controller
        // url[1] = Method
        // url[2] = Paramater
        // url[3] = Paramater
        // url[4] = Paramater

        $length = count($this->_url);

        //Make Sure the method we are calling exist
        if ($length > 1) 
        {
            if (! method_exists($this->_controller, $this->_url[1]))
            {
                // If The Method are is exist, call Error Handler
                $this->_404error();
            }
        }

        //Determinated what to load
        switch ($length)
        {
            case '5':
                #Controller->Method(Param1,Param2,Param3)
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                break;
            case '4':
                #Controller->Method(Param1,Param2)
                $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                break;
            case '3':
                #Controller->Method(Param1)
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case '2':
                #Controller->Method - > without params
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }

	/**
	 * error - function that handle app if there are no controller/method required
	 * @return [boolean|strings]
	 */
	private function _404error()
	{
		require $this->_controllerPath.'_404Controller.php';
		$this->_controller  = new _404Controller();
		return false;
	}
}
?>