<?php
  
  Class Logout extends Controller
  {

    public function __construct()
    {
    }

    public function index()
    {
            // 1- Empty the session array
            $_SESSION = array();
                // 2- Make the cookie expire
                 setcookie("user", " " , time()-3600, "/");
                 header("location:Home");
    }

  }
?>
