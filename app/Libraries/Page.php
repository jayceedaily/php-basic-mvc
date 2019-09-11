<?php
/**
 * 
 * Title: Page
 * Version: 1.5
 * Note: Needs more testing
 * Description: Allows access to resources
 * 
 */

class Page
{
	/**
	 * 
	 * Load anything inside views
	 * 
	 * @param string file name of view
	 * @param array data that will be used within the view
	 * 
	 * 
	 */

    public static function view($view_name,$data=array())
	{
		if (file_exists("../resources/Views/$view_name.php")):

			$page = new self;

			extract($data);
			
			include "../resources/Views/$view_name.php";

		else:

			self::error($view_name);
			
		endif;
	}

	/**
	 * 
	 * Load anything inside assets
	 * 
	 * @param string file name of asset
	 * 
	 * 
	 */
	public static function asset($asset_name)
	{
		if (file_exists("../resources/assets/$asset_name")):

			echo "/resources/assets/".$asset_name;

		elseif(file_exists("../public/$asset_name")):
			
			echo "/public/".$asset_name;
			
		else:

			self::error($asset_name);
			
		endif;
	}

	/**
	 * 
	 * Load anything inside views
	 * Does not allow variables
	 * 
	 * @param string file name of include file
	 * 
	 * 
	 */
	public static function include($view_name)
	{
		if (file_exists("../resources/Views/$view_name.php")):
			
			return "../resources/Views/$view_name.php";

		else:

			self::error($view_name);
			
		endif;
	}
	/**
	 * 
	 * Useful for identifying if in page
	 * 
	 * @param string the page for comparison
	 * @param string string to be returned
	 * 
	 * @return string 
	 * @return bool
	 * 
	 * 
	 */
	public function active($current,$activate)
	{
		$uri = $_SERVER["REQUEST_URI"];
		$uri = explode('/',$uri);
		$uri = implode("",$uri);
		$uri = explode('?',$uri);

		if(in_array($current,$uri)) return $activate;
		return false;
	}

	/**
	 * 
	 * Produces error message
	 * 
	 * @param string file name
	 * 
	 * 
	 */
	private static function error($file_name)
	{
		die('File <b>'.$file_name.'</b> not found');
	}
}