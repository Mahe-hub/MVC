<?php
Class Register extends Controller{
    public function __construct(){
        //define instance to connect with DB
        $this->usersModel = $this->model('usersModels');
    }

    public function index(){
        
        // define instance form pModel class for connection 
        $uservalid = new  userValidation(); 
        $uservalid->startSession();
        
        // show the view 
        $this->view('Users/create_user');
    }

    // if user click on register button 
    private function registerUser()
    {
       
        
          if(isset($_POST['signup']))
          {
            // Define vairable save the input 
            $userinfo = [
                'u_fname'=>$_POST['inputFname'],
                'u_lname'=>$_POST['inputLname'],
                'u_dob'=>$_POST['inputDOB'],
                'u_phone'=>$_POST['inputpnumber'],
                'u_passwod'=> password_hash($_POST['inputPassword'],PASSWORD_DEFAULT),
                'u_Email'=>$POST['inputEmail'],
                'u_Addr'=>$POST['inputStreet'],
                'u_City'=>$POST['inputCity'],
                'u_Stat'=>$POST['inputState'],
                'u_Zcode'=>$POST['inputZip'],
                'u_Email'=>$POST['inputEmail'],
                'u_country'=>$POST['inputCountry']
                 
            ];

            // Get confirmation that user created 
            $confirmationCustomer = $this->usersModel->CreateCustomer($userinfo);
            $confirmationUser = $this->userModel->createUser($userinfo);
            // if we reive true from model 
              if ($confirmationCustomer &  $confirmationUser)
              {
                 header("Location: /bike_project/Login");
              }
              else
              {
                echo "something wrong happen try againg ";
              }
            }

            // if we have false
            else
            {
                $this->view('Users/create_user');
            }  
        }
    }
        
    
