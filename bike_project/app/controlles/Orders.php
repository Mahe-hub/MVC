<?php
Class  Orders extends Controller
{
        public function __construct()
        {
            // define instance form pModel class for connection 
            $this->usersModel = $this->model('usersModels');
        }

        public function index()
        {
            
            
            // define instance form pModel class for connection 
            $uservalid = new  userValidation(); 
            $uservalid->startSession();
            
            // get the id 
            $id=(int)$_GET['product_id'];
            
            //check if the id is updated
            if($this->isExist($id))
            {
                $addSucess = $this->usersModel->add([
                    'email'=>$_SESSION['username'], 
                    'product_id'=>$id
                ]);
                header("location: ".URL_ROOT."Products");
               
                //$this->view('Order_Details/Add_Order');   
            }else{
              
            }
        }




     


         private function isExist($id)
         {
            $result=$this->usersModel->checkProduct($id);
            return $result;

         }

         private function addOrder($useremail,$id)
         {
            $data=['emai'=>$useremail,
                   'product_id'=>$id];
            $addresult = $this->usersModel->add($data);
         }

         public function deleteOrder()
         {
        
            // define instance form pModel class for connection 
            $id =(int)$_GET['deleteid'];
            if( $this->usersModel->deleteOrd($id))
            {
                header("location: ".URL_ROOT."Products");
            }else{
               
            }
         }

    
         

}