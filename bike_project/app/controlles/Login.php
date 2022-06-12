<?php
class Login extends  Controller

{
    public function __construct(){

        //define instance from controler 
        // make it equal to instance from corsponded model(table) which made the conection to DB 
        $this->usermodel = $this->model('usersModels');
      
    }

    public function index(){
         
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
            if(isset($_POST['user_name']))
            {
                if(!empty($_POST['user_name']))
                {
                    // now we check if the inputs exist in the DB 
                    if($this->userIsExist($_POST['user_name']) && $this->passwordIsExist($_POST['user_name'],$_POST['user_password'])) 
                    {
                        // start the session 
                        session_name('user');
                        session_id('user_id');
                        session_start() != FALSE or die("Could not start session");	
                        // save the user name  in Global vairbale to secure the pages later 
                        $_SESSION['current_user'] = $_POST['user_name'];

                        // close the session and redirect 
                        session_write_close()!=FALSE or die("could not close the session ");
                        // product is temprory 
                        header("location:/bike_project/Products");
                    }
                    else
                    {
                        // show message to the user 
                        // define virable to save the message
                        $user_Msg="Invalid user name or password";
                        $data_msg = ['user_msg' => $user_Msg] ;
                        // pass the value to the view 
                        $this->view('Login/login',$data_msg);
                    }
                }
            }
        }
    }


    // create method to check the if the user name is exsist
    private function userIsExist($uName)
    {
        // define vairable to save the user info 
        $user_Details = $this->usermodel->getuserByname($uName);
        
        // return true if email is exist 
        return ( $user_Details);
    }

    // Create method to check if the user password is exist 
    private function passwordIsExist($uName,$Upasswd)
    {
        // define a vairable to save the user info 
        $user_passwd = $this->usermodel->getPassword($uName);

        return password_verify($Upasswd,$user_passwd->Password);
    }

   
}





?>