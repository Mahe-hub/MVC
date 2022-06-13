<?php
// secure the products page 
class Products extends Controller
{
        public function __construct()
        {
            // define instance form pModel class for connection 
            $this->usersModel = $this->model('usersModels');
            // define instance form pModel class for connection 
            $uservalid = new  userValidation(); 
        
        }


        public function index()
        {
        
            // define instance form pModel class for connection 
            $uservalid = new  userValidation(); 
            $uservalid->startSession();
            
                if( $uservalid->verfication())
                {
                    $this ->view('Products/products_view');
                }

                else
                {
                    session_write_close();
                    header("Location:".URL_ROOT."Login?redirect=users");
                }
        
        }


}