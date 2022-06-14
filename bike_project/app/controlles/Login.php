<?php
class Login extends  Controller

{
        public function __construct()
        {

            //define instance from controler 
            // make it equal to instance from corsponded model(table) which made the conection to DB 
            $this->usermodel = $this->model('usersModels');
        
        }

        public function index()
        {
            
            // call a function to check  the user name  and password 
            $this->checklogin();
            // if user did not enter the username & password we will call the view 
            $this ->view('Login/login');
          

         
        }


        // create the function login 
        public function checklogin()
        {
            // if user click on the button signin 
            if($_SERVER['REQUEST_METHOD'] =='POST')
            {
                if(!empty($_POST['username']))
                {
                   // now we check if the inputs exist in the DB 
                   if(
                      $this->userisExist($_POST['username']) 
                      &&
                      $this->passwordisExist($_POST['username'],$_POST['userpassword'])
                     ) 
                     {
                         // start the session 
                         session_name("user");
                         session_id("userid");
                         session_start() != FALSE or die("Could not start session");	
                        // save the user name  in Global vairbale to secure the pages later 
                        $_SESSION['username'] = $_POST['username'];
                                
                        // close the session and redirect 
                        session_write_close()!=FALSE or die("could not close the session ");
                        // call the method redirect page
                        $redirectPage = $this->redirectPages();

                        // header ("location:".URL_ROOT."Customers");

                        if(!empty($redirectPage))
                        {
                          header("location: ".URL_ROOT.$redirectPage);
                        }
                       else
                        {
                          header ("location: ".URL_ROOT."Home");
                        }
                     }
                     else
                      {
                         // show message to the user 
                         // define virable to save the message
                         $user_Msg="Invalid user name or password";
                         $data_msg = ['message' => $user_Msg] ;
                         // pass the value to the view 
                         $this->view('Login/login',$data_msg);
                      }
                }  
            }
        }


        // create method to check the if the user name is exsist
        private function userisExist($username)
        {
                // define vairable to save the user info 
                $user_Details = $this->usermodel->getuserbyEmail($username);
                
                // return true if email is exist 
                return ( $user_Details);
        }

        // Create method to check if the user password is exist 
        private function passwordisExist($username,$userpassword)
        {
                // define a vairable to save the user info 
                $user_passwd = $this->usermodel->getPassword($username);

                return( password_verify($userpassword,$user_passwd->password));
               
        }

        // create function to redirect to pages 
        private function redirectPages()
        {
                $url ="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $querystring =explode('=',parse_url($url, PHP_URL_QUERY));
                // to save the iteams of querystring
                $result=[];
                for($counter=0; $counter<(count($querystring)-1); $counter++)
                {
                        $result[$querystring[$counter]] = $querystring[$counter+1];
                }

                if(isset($result["redirect"]))
                {
		                return $result["redirect"];
		        }
                else 
                {
		 	             return "";
		        }
        }

   
}





?>