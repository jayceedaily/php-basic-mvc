<?php

/**
 * 
 * Title: Controller
 * Version: 1.2
 * Note: Needs more testing
 * Description: functions that are shared towards all controllers
 * 
 */
class Controller extends Middleware
{
    /**
     * 
     * Load Classes for controller use
     * 
     * @param array libraries
     * 
     */
    protected function library($libs = array())
    {

        foreach($libs as $lib):
			
            $_lib_var   = strtolower($lib);
            $_lib_name  = ucfirst($_lib_var);
			
            $this->$_lib_var = new $_lib_name;
            
        endforeach;
    }
}
