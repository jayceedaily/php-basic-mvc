<?php
/**
 * 
 * Title: Input
 * Version: 1.0
 * Note: Needs more testing
 * Description: validate and use get and post request
 * 
 */

Class Input
{    
    /**
     * 
     * Checks if GET variable is available and not empty
     * 
     * @param GET variable name
     * 
     * @return string
     * @return bool
     * @return array
     * 
     * 
     */
    public function get($param = null)
    {
        if(is_null($param)) return $_GET;
        if(isset($_GET[$param]) && !is_null($_GET[$param])) return $_GET[$param];
        return false;
    }

    /**
     * 
     * Checks if POST variable is available and not empty
     * 
     * @param POST variable name
     * 
     * @return string
     * @return bool
     * @return array
     * 
     * 
     */
    public function post($param = null)
    {
        if(is_null($param)) return $_POST;
        if(isset($_POST[$param]) && !is_null($_POST[$param])) return $_POST[$param];
        return false;
    }
}