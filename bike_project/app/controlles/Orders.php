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
            $id = $this->redirectProduct();
            //check if the id is updated
            if($this->isExist($id))
            {
               
                  $addSucess=$this->addOrder($_SESSION['username'],$id);
                //  if($addSucess)
                //  {
                    // header("Location:Products");
                //  }

                //  else
                //  {

                //  }
            } 
            else
            {

            }
            // if(productisExit($id))
            // {
               
            // }
            // else
            // {

            // }

            // $this->addorder();
        }




        private function redirectProduct()
        {
                $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $querystring =explode('=',parse_url($url, PHP_URL_QUERY));
                // to save the iteams of querystring
                $result=[];
                for($counter=0; $counter<(count($querystring)-1); $counter++)
                {
                        $result[$querystring[$counter]] = $querystring[$counter+1];
                }

                if(isset($result["productid"]))
                {
		                return $result["productid"];
		        }
                else 
                {
		 	             return "";
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

}