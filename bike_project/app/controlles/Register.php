<?php
Class Register extends Controller
{
        public function __construct()
        {
            //define instance to connect with DB
            $this->usersModel = $this->model('usersModels');
        }

        public function index()
        {
            
            // define instance form pModel class for connection 
            $uservalid = new  userValidation(); 
            $uservalid->startSession();
            
            // show the view 
            $this->view('Users/create_user');
        }

    // if user click on register button 
        public function registerUser()
        {   
            if(array_key_exists('signup',$_POST))
            {
                // Define vairable save the input 
                $userinfo = [
                    'firstname'=>$_POST['firstname'],
                    'lastname'=>$_POST['lastname'],
                    'dateofbirth'=>$_POST['dateofbirth'],
                    'phonenumber'=>$_POST['phonenumber'],
                    'password'=> password_hash($_POST['password'],PASSWORD_DEFAULT),
                    'email'=>$_POST['email'],
                    'address'=>$_POST['address'],
                    'city'=>$_POST['city'],
                    'state'=>$_POST['state'],
                    'zipcode'=>$_POST['zipcode'],
                    'country'=>$_POST['country']
                     ];

                    // Get confirmation that user created 
                    $confirmationUser = $this->usersModel->createUser($userinfo);
                    $confirmationCustomer = $this->usersModel->createCustomer($userinfo);
            
                    // if we reive true from model 
                    if ($confirmationCustomer & $confirmationUser)
                    {
                        header("Location:".URL_ROOT."/Login");
                    }
                    else
                    {
                        header("Location:".URL_ROOT."/Register");
                    }
                }
                else
                {
                    header("Location:".URL_ROOT."/Register");
                }  
            }
    }
        
    
