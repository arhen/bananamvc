<?php 

/********************************************************************************
							CONFIGURATION FILE
********************************************************************************/
$config = 'config.php';
//Check the Configuration File
if (! is_file($config)) 
{
	echo "<p>Make Sure there are config.php in your directory</p>";
	echo "<p>If there are file name are config.example.php, please rename it!</p>";
	return false;
}else
{
	require_once $config;
}

/********************************************************************************
								AUTOLOADER
********************************************************************************/
if (! is_file(AUTOLOADER)) {
	echo "<p>Make Sure you have an Autoloader File!!</p>";
	echo "<p>Check your Configuration File!!</p>";
	return false;
}else{
	require_once AUTOLOADER;
}

/********************************************************************************
							HERE WE GO!!!!!!!
********************************************************************************/
// Instance App Class that contain Main Wep Apps Logic 
$app = new App();

/***************
 	Optional
 **************/
// $app->setModelPath('blah'); 			#default: 'application/models/'
// $app->setViewPath('blah'); 			#default: 'application/views/'
// $app->setControllerPath('blah'); 	#default: 'application/controllers/'
// $app->setDefaultController('blah')	#default: 'IndexController'

// BOOM! Show an Awesome Apps!
$app->init();

?>
