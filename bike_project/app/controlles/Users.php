<?php
Class Users extends Controller
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

                $info = ['user_info'=>$this->usersModel->getuserbyEmail($_SESSION['username'])];
                $this->view('Users/show_user',$info);         
                
                
            }
            else
            {
              // close the session 
              session_write_close();
              // redirect to the login page and take parameter
              header("location:".URL_ROOT."Login?redirect=Users");
           }
           
        }



        public function updateUser()
        {
         
          
            $infobeforeUpdate = ['user_info'=>$this->usersModel->getuserbyEmail($info->email)];
            $this->view('Users/update_user', $infobeforeUpdate); 

            if(isset($_POST['update']))
            {


                 $oldData=['firstname'=>$_POST['firstname'],
                          'lastname'=>$_POST['lastname'],
                          'dateofbirth'=>$_POST['dateofbirth'],
                         'phonenumber'=>$_POST['phonenumber'],
                          'email'=>$_POST['email'],
                          'address'=>$_POST['address'],
                          'city'=>$_POST['city'],
                          'state'=>$_POST['state'],
                           'zipcode'=>$_POST['zipcode'],
                          'country'=>$_POST['country']
                         ];
                 $updatesucess =$this->usersModel->updateuserInfo($oldData);
                 if($updatesucess)
                 {
                //    // header("location:".URL_ROOT."Users");
                 }
                 else
                {
                //     header("location".URL_ROOT."Users/updateUser");
                 }
            }
        }


}