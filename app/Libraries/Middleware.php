<?php
/**
 * 
 * Title: Middleware
 * Version: 1.0
 * Note: Needs more testing
 * Description: For checking before anything else run
 * 
 */

class Middleware
{
    /**
     *  Initialize the middleware that is specified
     * 
     *  @param array middleman names
     */
    public function middleman($middlewares = array())
    {
        foreach($middlewares as $_middleware):
            $this->$_middleware();
        endforeach;
    }
    /**
     *  Checks for logged in user
     *  @return boolean
     */
    private function auth()
    {
        $this->library(['session']);
        
        if(!$this->session->hasSession('logged_in')) header('location:/login');
    }

}