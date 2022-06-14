<?php

class userValidation
{
    public function verfication()
    {
        $valid;
	    if(isset($_SESSION['username']))
      {
            if(!empty($_SESSION['username']))
            {
              return true;
            }
             
            else 
            {
            return false;
            }
      }
    }	

    public function startSession()
    {

      session_name("user");
          
      session_start() != FALSE or die("Could not start session");

    }
}