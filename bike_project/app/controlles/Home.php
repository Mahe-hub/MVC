<?php
Class Home extends Controller
{
        public function __construct()
        {
        
        }

        public function index()
        {
           // define instance form pModel class for connection 
            $uservalid = new  userValidation(); 
            $uservalid->startSession();
            if( $uservalid->verfication())
            {
                // call about view 
                $this->view('Home/home');
            }
            else
            {
                // close the session 
                session_write_close();
                // redirect to the login page and take parameter
                header("Location:".URL_ROOT."Login?redirect=Home");
            }
        }



  
}