<?php
/**
 * 
 * Title: Session
 * Version: 1.0
 * Note: Needs more testing
 * Description: a library that makes use of the $_SESSION
 * 
 */

class Session
{
    /**
     * 
     * Initialize session (if not yet initialized)
     * 
     */
    public function __construct()
    {
        if(!$this->hasSession()) session_start();
    }

     /**
     * 
     * Sets $_SESSION value
     * 
     * @param string index
     * @param string,array array or string value
     * 
     */
    public function setSession($param = null, $value = null)
    {
        return $_SESSION[$param] = $value;
    }

    /**
     * 
     * Unsets $_SESSION value
     * 
     * @param string index
     * @return bool
     */
    public function unsetSession($param)
    {
        unset($param);
    }

    /**
     * 
     * Validates and check $_SESSION value
     * 
     * @param string index
     * @return bool
     */
    public function hasSession($param=null)
    {

        if($param==null && !empty($_SESSION)) return true;
        if(isset($_SESSION[$param])) return true;

        return false;
    }

    /**
     * 
     * Read $_SESSION value
     * 
     * @param string index
     * @param string index
     * 
     * @return bool
     */
    public function sessionData($param = null, $value = null)
    {
        if($param == null && $value == null):
            return $_SESSION;
        elseif($param != null && $value == null):
            return $_SESSION[$param];
        else:
            $data =  $_SESSION[$param];
            return $data[$value];
        endif;
    }
    
    public function setFlash($index,$data)
    {
        $_SESSION['flashdata'] = array($index=>$data);
    }

    public function flash(String $data)
    {
        if(isset($_SESSION['flashdata'][$data])):

            $flash = $_SESSION['flashdata'][$data];
            unset($_SESSION['flashdata']);
     
            
            return $flash;
        endif;
      
    }

    public function sessionHold()
    {
        session_write_close();        
    }
}