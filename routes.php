<?php
/**
 * 
 * Title: Routes
 * Version: 1.3
 * Note: Needs more testing
 * Description: Routes url to controllers
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

$route->set('/','HomeController@index');