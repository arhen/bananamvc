<?php 

/**
 * 
 */
 class Auth extends Session
 {
 	private $check = false;

 	/**
 	 * Login function - Function for Authenticate Sessions 
 	 * @param  array  $auth [if doesnt null, it will be check the array passed for every array matched in this Session]
 	 * @return Will be return true if array doesnt match anything, else False.
 	 */
 	public static function login($auth = array())
 	{
 		Session::init();
 		$logged = Session::get('loggedIn');
 		if ($auth != array()) 
 		{
	 			$check = true;
				if ($logged == false || $check == true) 
				{
					foreach ($auth as $key => $value) 
					{
						if (Session::get($key) != $value) 
						{
							Session::destroy();
							header('location: '.URL.'login');
							exit;
						}
	 			}
	 			
	 		}
	 	}
 		if ($auth == array()) 
 		{
 			if ($logged == false) {
 				Session::destroy();
				header('location: '.URL.'login');
				exit;
 			}
 		}else 
 		{
 			if ($logged == false)
 			{
 				Session::destroy();
				header('location: '.URL.'login');
				exit;
 			}
 		}
 	}

 }
  ?>