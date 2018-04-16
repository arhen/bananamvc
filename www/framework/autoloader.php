<?php 
/********************************************************************************
								AUTOLOADER
********************************************************************************/
/**
 * this function for load automatically All classes in the libs folder
 * @param  [string] $class [name of class]
 * @return [string]        
 */
function autoload($class)
{
	$namafile = 'cores/'.$class.'.php';
	require $namafile; 
}
// a dinamically autoload method that can be matching with different autoload function
// take a look for __autoload() function to learn some stuff with autoload means.
spl_autoload_register('autoload');


 ?>