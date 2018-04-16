<?php 
//Always providing a TRAILING SLASH!
DEFINE('URL', 'http://localhost/mvc/');
DEFINE('APPPATH', 'application/');

// This is your autoloader File. If you use another auloader, change the PATH bases on it!
DEFINE('AUTOLOADER','framework/autoloader.php');

// This is the Siteweb Hash Key. It used by Password, so dont Change it except u know what are did!
// This is for general hasing.
DEFINE('HASH_GENERAL_KEY', 'kndfbKB$%Q#^&GBDSKNkhgvbasKH');
//this is for Hashing password only
DEFINE('HASH_PASSWORD_KEY', 'Dasknk#$Q@$#@Kndsjvb@#R$');

/**
 * this is Contstant for Databases
 */
DEFINE('DB_TYPE', 'mysql');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'mvc');
DEFINE('DB_USER', 'root');
DEFINE('DB_PASS', '');

/**
 * Timezone Set
 */
date_default_timezone_set('Asia/Makassar');

?>