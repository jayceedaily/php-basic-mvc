<?php
/**
 * 
 * Title: Router
 * Version: 2.1.0
 * Note: Needs more testing
 * Description: This routes all request to their respective controllers
 * 
 * 	 example:
 * 
 *   	Working
 * 		link 	    -> www.website.com/help/$
 * 		route 	    -> controller@help
 *      controller  -> function($)
 * 
 * 		
 */

  class Router
  {

	/**
	 * 
	 * Define a varaible for checking if a route is loaded
	 * 
	 */	
	public static $load;
	public static $url;

	/**
	 * 
	 * Initialize to false
	 * 
	 * @param bool
	 * 
	 */	
	public function __construct()
	{
		self::$load = false;
		self::$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "";
	}

	/**
	 * 
	 * Initialize controllers that are specified from the routes
	 * 
	 * @param string
	 * @param string
	 * 
	 * @return boolean
	 * 
	 */	
    public static function set($route, $controller)
    {
		if(self::$load)die();

		$_get		= explode('?',self::$url);		
		$_url 		= trim($_get[0],'/');
		$_url 		= explode('/',$_url);
		$_route 	= explode('/',$route);
		$_key 		= array_search('$',$_route);
		$param 		= isset($_url[$_key])? $_url[$_key] : null;
		$_reset 	= $_key && !is_null($param);
		
		if($_reset):
			unset($_url[$_key]);
			unset($_route[$_key]);
		endif;

		$_new_url 	= implode('/',$_url);
		$_route 	= implode('/',$_route);

		if($_new_url === $_route ):
			return self::request($controller,$param);
		endif;
	}
	
	/**
	 * 
	 * Initialize controllers that are specified from the routes
	 * 
	 * @param string
	 * @param function
	 * @param string
	 * 
	 */	
    private static function request($controller,$param = null)
    {
		self::$load = true;

		if(is_callable($controller)):
			return $controller->__invoke();
		endif;

        $request        =  explode('@',$controller);
        $_controller    = $request[0];
        $_function      = isset($request[1]) ? $request[1] : 'index';
		$instance 		= new $_controller;
		
		$instance->$_function($param);
	}

	/**
	 * 
	 * Throws error if no route has been loaded
	 * 
	 */	
	public function checkRoute()
	{
		if(!self::$load):
			http_response_code(404);
			die('No route found');
		endif;
	}
  }
 