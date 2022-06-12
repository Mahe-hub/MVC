<?php
  
  Class About extends Controller{


      public function __construct()
      {
         
      }
      public function index(){
        // define instance form pModel class for connection 
        $uservalid = new  userValidation(); 
        $uservalid->startSession();
        if( $uservalid->verfication())
        {
        // call about view 
        $this->view('About/about');
        }
        else
        {
          // close the session 
          session_write_close();
          // redirect to the login page and take parameter
          header("Location: /bike_project/Login?redirect=about");
        }
  }
}