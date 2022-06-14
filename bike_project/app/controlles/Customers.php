<?php
Class Customers extends Controller
{

        public function __construct()
        {
            $this->usersModel = $this->model('usersModels');
        }

        public function index()
        {
             // define instance form pModel class for connection 
            $uservalid = new  userValidation(); 
            $uservalid->startSession();
            if( $uservalid->verfication())
            {

                $this->showCustomer();
                $this->view('Customers/show_customer');
            }
            else
            {
              // close the session 
              session_write_close();
              // redirect to the login page and take parameter
              header("location:".URL_ROOT."Login?redirect=Customers");
           }
           
        }

        public function showCustomer()
        {

            
            

        }

}