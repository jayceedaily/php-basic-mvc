<?php
/**
 * 
 * Title: Index
 * Version: 1.3
 * Note: Needs more testing
 * Description: Autoloads necesarry files
 * 
 */
define('GIGA', TRUE);
error_reporting( 0 ); 
spl_autoload_register(function($class_name)
{
	
	if(is_file('../app/Libraries/'.$class_name.'.php')):
		require_once('../app/Libraries/'.$class_name.'.php');
	elseif(is_file('../app/Controllers/'.$class_name.'.php')):
		require_once('../app/Controllers/'.$class_name.'.php');
	elseif(is_file('../app/Models/'.$class_name.'.php')):
		require_once('../app/Models/'.$class_name.'.php');
	endif;
});
$route = new Router;

require_once('../routes.php');
$route->checkRoute();