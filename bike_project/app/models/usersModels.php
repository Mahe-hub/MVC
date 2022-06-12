<?php

class usersModels{

    public function __construct(){
        // define instance from Model class to connect the DB 
        $this->db = new Models();   
    }


    public function getalluser(){
    // execute query as get all users
    // prepare the statment
    $this->db->query("SELECT * FROM users");
    // get the result and return it to controller
     return $this->db->getAllData();
    }
    
    // get single user
     public function getuserId($fname,$lname,$DOB){
         // prepare the statment 
          $this->db->query("SELECT Cust_id FROM customers WHERE Fname =:fname 
                                                    AND Lname=:lname
                                                    AND DateofBirth=:dob");
        //  bind the value 
          $this->db->bind(":fname",$fname);
          $this->db->bind(":lname,$lname");
          $this->db->bind(":dob",$DOB);
        // get user info
        return $this->db->getSingleData();
     }


    // get single user by name 
    public function getuserByname($name){
        // prepare the statment 
        $this->db->query("SELECT * FROM users WHERE Email=:email");
        // bind the value 
        $this->db->bind(":email",$name);
        // get user info
        return $this->db->getSingleData();
    }


    // get the password of user 
    public function getPassword($name){
        $this->db->query("SELECT Password FROM users WHERE Email = :email");
        $this->db->bind(":email",$name);
        return $this->db->getSingleData();
    }



   // create user in the DB where data is from USER controler 
    public function CreateCustomer($data){
       // prepare the statment 
     $this->db->query("INSERT INTO customers
                      (Fname,Lname,DateofBirth,Province,City,street,Zipcode,country,Phone_number,Email,Password) 
                      VALUES
                    (:fname,:lname,:dob,:province,:city,:street,:zipcode,:country,:phone,:email,:password)");
    //     bind the parameters 
            $this->db->bind(":fname",$data['u_fname']);
            $this->db->bind(":lname",$data['u_lname']);
            $this->db->bind(":dob",$data['u_dob']);
            $this->db->bind(":province",$data['u_Stat']);
            $this->db->bind(":city",$data['u_City']); 
            $this->db->bind(":street",$data['u_Addr']);
            $this->db->bind(":zipcode",$data['u_Zcode']);
            $this->db->bind(":country",$data['u_country']);
            $this->db->bind(":phone",$data['u_phone']);
            $this->db->bind(":email",$data['u_Email']);
            $this->db->bind(":password",$data['u_passwod']);
       // excute 
            if($this->db->execute())
            {
            $id= $this->db->DBH->lastInsertId();
       //save the inserted user in array and return to model 
            $LastInsertuser = ['id' => $id,
                              'created' => true];
            return $LastInsertdata;
       }
         else{
             return false;
       }

     }


     public function createUser($data)
     {
        $user_customer_id = $this-> getuserId($data['u_fname'],$data['u_lname'],$data['u_dob']);
         // prepare the statment 
         $this->db->query("INSERT INTO  users (Email,Password,Cust_id )
                           VALUES (:email,:passwd,:c_id)");
        //bind the parameters 
        $this->db->bind(":email",$data['u_Email']);
        $this->db->bind(":passwd",$data['u_passwod']);
        $this->db->bind(":c_id",$user_customer_id);
        
         // excute 
         if($this->db->execute())
         {
         $id= $this->db->DBH->lastInsertId();
         //save the inserted user in array and return to model 
         $LastInsertuser = ['id' => $id,
                           'created' => true];
         return $LastInsertdata;
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
    public function delete($id){
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(":id",$id);
        if($this->db->execute()){
            return true;
        }
        else {
            return false;
        }


    }


    
}