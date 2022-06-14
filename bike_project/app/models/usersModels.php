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
            $this->db->query("INSERT INTO  users 
                             (email,
                              password,
                              first_name,
                              last_name,
                              dateofbirth,
                              phone_number,
                              country,
                              province,
                              city,
                              address,
                              postal_code 
                             )
                              VALUES 
                              (
                                :email,
                                :password,
                                :firstname,
                                :lastname,
                                :dateofbirth,
                                :phone,
                                :country,
                                :province,
                                :city,
                                :address,
                                :postalcode
                              )");
            //bind the parameters 
            $this->db->bind(":email",$data['email']);
            $this->db->bind(":password",$data['password']); 
            $this->db->bind(":firstname",$data['firstname']);
            $this->db->bind(":lastname",$data['lastname']);
            $this->db->bind(":dateofbirth",$data['dateofbirth']);
            $this->db->bind(":phone",$data['phonenumber']);
            $this->db->bind(":country",$data['country']);
            $this->db->bind(":province",$data['state']);
            $this->db->bind(":city",$data['city']); 
            $this->db->bind(":address",$data['address']);
            $this->db->bind(":postalcode",$data['zipcode']);
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
      public function getuserbyEmail($email)
      {
            // prepare the statment 
            $this->db->query("SELECT * FROM users WHERE email=:email");
            // bind the value 
            $this->db->bind(":email",$email);
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



    //update the exsist user info 
     public function updateuserInfo($data){
       $this->db->query(
                        "UPDATE users 
                         SET  first_name = :firstname,
                              last_name = :lastname,
                              dateofbirth = :dateofbirth,
                              phone_number = :phonenumber,
                              email = :email,
                              password = :password,
                              country = :country,
                              province = :province,
                              city = :city,
                              address = :address,
                              postal_code =:postalcode
                            
                              WHERE id =:id");
        
     // bind the parameters 
       $this->db->bind(":firstname",$data['firstname']);
       $this->db->bind(":lastname",$data['lastname']);
       $this->db->bind(":dateofbirth",$data['dateofbirth']);
       $this->db->bind(":phonenumber",$data['phonenumber']);
       $this->db->bind(":email",$data['email']);
       $this->db->bind(":password",$data['password']);
       $this->db->bind(":country",$data['country']);
       $this->db->bind(":province",$data['province']);
       $this->db->bind(":city",$data['city']);
       $this->db->bind(":address",$data['address']);
       $this->db->bind(":postalcode",$data['postalcode']);

    // excute
       if($this->db->execute())
           {
             return true;
           }
      else {
             return false;
           }
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
      
      //Products functions
      public function getProducts()
      {

        $this->db->query("SELECT * FROM products");
        return $this->db->getAllData();

      }

      public function checkProduct($id)
      {
        $this->db->query("SELECT * FROM products WHERE id=:id");
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
      
      //Orders function 
      public function add($data)
      {
        $this->db->query("INSERT INTO orders (user_email,product_id)
                          VALUES (:email,:id");
         $this->db->bind(":email",$data['email']);
         $this->db->bind(":id",$$data['product_id']);
         if($this->db->execute())
        {
            return true;
        }
        else 
        {
            return false;
        }
        
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