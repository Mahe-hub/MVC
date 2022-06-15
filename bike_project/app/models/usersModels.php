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


      
      //Products functions
      public function getProducts()
      {

        $this->db->query("SELECT * FROM products");
        return $this->db->getAllData();

      }
      
      // check if product is exist 
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

      //search product by brand&category
      public function searchProduct($searchValue)
      {
        $this->db->query("SELECT *
                          FROM products
                          WHERE CONCAT(brand,category) LIKE '%$searchValue%'");
        return $this->db->getAllData();
      }

      

      //get product by email
      public function getProduct($email)
      {
        $this->db->query("SELECT *
                          FROM orders
                          WHERE user_email = :email");
        $this->db->bind(":email",$email);

        return $this->db->getSingleData();
      }
      //get product by id
      public function getuserProduct($id)
      {
        $this->db->query("SELECT *
                          FROM products 
                          WHERE id = :id");
        $this->db->bind(":id",$id);
         
        return $this->db->getSingleData();

      }
      //Orders function 

      //add order
      public function add($data)
      {
        $this->db->query("INSERT INTO orders (user_email,product_id)
                          VALUES (:email,:id)");
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":id", $data['product_id']);

         return $this->db->execute();        
      }

      //delete order
      public function deleteOrd($id)
      {
        $this->db->query("DELETE FROM orders
                          WHERE id=:id");
        $this->db->bind(":id",$id);
        return $this->db->execute();                  
      }

      // get all orders
      public function getOrders($email)
      {
        $this->db->query("SELECT *
                          FROM orders
                          WHERE user_email=:email");
        $this->db->bind(":email",$email);
        
        return $this->db->getAllData();
      }
    




    
}