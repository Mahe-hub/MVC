<?php

class usersModels{

      public function __construct()
      {
            // define instance from Model class to connect the DB 
            $this->db = new Models();   
      }

      //users function 

            
      //create user
      public function createUser($data)
      {
           


            // prepare the statment 
            $this->db->query("INSERT INTO  users (email,password)
                              VALUES (:email,:password)");
            //bind the parameters 
            $this->db->bind(":email",$data['email']);
            $this->db->bind(":password",$data['password']);
         
            
            // excute 
            if($this->db->execute())
            {
              $LastInsertuser = true;
              return $LastInsertuser;
            }
            else
            {
               return false;
            }
       }




      //get all users 
      public function getallUsers()
      {
        // execute query as get all users
        // prepare the statment
        $this->db->query("SELECT * FROM users");
        // get the result and return it to controller
        return $this->db->getAllData();
      }

  
      // get single user by name 
      public function getuserbyName($username)
      {
            // prepare the statment 
            $this->db->query("SELECT * FROM users WHERE email=:email");
            // bind the value 
            $this->db->bind(":email",$username);
            // get user info
            return $this->db->getSingleData();
      }


      // get the password of user 
      public function getPassword($username)
      {
            $this->db->query("SELECT password FROM users WHERE email = :email");
            $this->db->bind(":email",$username);
            return $this->db->getSingleData();
      }

      // delete user 
      public function delete($id)
      {
                   $this->db->query("DELETE FROM users WHERE id = :id");
                   $this->db->bind(":id",$id);
                   if($this->db->execute())
                   {
                       return true;
                   }
                   else 
                   {
                       return false;
                   }
       }


      //Customers functions
      // create customer in the DB 
      public function createCustomer($data)
      {
          // prepare the statment 
        $this->db->query("INSERT INTO customers
                          (first_name,
                          last_name,
                          date_of_birth,
                          province,
                          city,
                          street,
                          zipcode,
                          country,
                          phone_number) 
                          VALUES
                        (:firstname,
                         :lastname,
                         :dateofbirth,
                         :province,
                         :city,
                         :street,
                         :zipcode,
                         :country,
                         :phone)"
                         );
        //     bind the parameters 
                $this->db->bind(":firstname",$data['firstname']);
                $this->db->bind(":lastname",$data['lastname']);
                $this->db->bind(":dateofbirth",$data['dateofbirth']);
                $this->db->bind(":province",$data['state']);
                $this->db->bind(":city",$data['city']); 
                $this->db->bind(":street",$data['address']);
                $this->db->bind(":zipcode",$data['zipcode']);
                $this->db->bind(":country",$data['country']);
                $this->db->bind(":phone",$data['phonenumber']);

        // insert the customer_id into users table
               
              
          // excute 
                if($this->db->execute())
                {
                  //save the inserted user in array and return to model 
                  $LastInsertcustomer =  true;
                  return $LastInsertcustomer;
                }
              else
                {
                        return false;
                }

      }

     public function showcustomerDetails($username)
     {
      //get customer
      $this->db->query("SELECT * FROM  Where email = :email");
      $this->db->bind(":email",$username);
      $customerdetails =$this->db->getSingleData();
     }

      

      //Products functions
      public function getProducts()
      {

        $this->db->query("SELECT * FROM products");
        return $this->db->getAllData();

      }
        

    // //update the exsist user info 
    // public function updateUser($data){
    //     $this->db->query("UPDATE users SET name = :name,email =:email,phone = :phone WHERE id=:id");
        
    //     // bind the parameters 
    //     $this->db->bind(":name",$data['name']);
    //     $this->db->bind(":email",$data['email']);
    //     $this->db->bind(":phone",$data['phone']);
    //     $this->db->bind(":id",$data['id']);

    //     // excute
    //     if($this->db->execute()){
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }

    // delete user 
    // public function delete($id)
    // {
    //     $this->db->query("DELETE FROM users WHERE id = :id");
    //     $this->db->bind(":id",$id);
    //     if($this->db->execute()){
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    




    
}