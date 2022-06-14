<?php
// secure the products page 
class Products extends Controller
{
        public function __construct()
        {
            // define instance form pModel class for connection 
            $this->usersModel = $this->model('usersModels');
            
           
        
        }


        public function index()
        {
            $uservalid = new  userValidation(); 
            // define instance form pModel class for connection
            $uservalid->startSession();
            
                if( $uservalid->verfication())
                {
                    $data=['getproduct'=>$this->usersModel->getProducts()];
                    $this ->view('Products/products_view',$data);
                }

                else
                {
                    session_write_close();
                    header("Location:".URL_ROOT."Login?redirect=products");
                }
        
        }

    
         


}