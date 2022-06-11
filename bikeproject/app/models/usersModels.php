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
    public function getuser($id){
        // prepare the statment 
        $this->db->query("SELECT * FROM users WHERE id =:id");
        // bind the value 
        $this->db->bind(":id",$id);
        // get user info
        return $this->db->getSingleData();
    }


    // create user in the DB where data is from USER controler 
    public function CreateUser($data){
        // prepare the statment 
        $this->db->query("INSERT INTO users(name,email,phone) VALUES (:name,:email,:phone)");
        // bind the parameters 
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        // excute 
        if($this->db->execute()){
            $id= $this->db->DBH->lastInsertId();
            //save the inserted user in array and return to model 
            $LastInsertdata = ['id' => $id,
                     'created' => true];
            return $LastInsertdata;
        }
        else{
            return false;
        }

    }

    //update the exsist user info 
    public function updateUser($data){
        $this->db->query("UPDATE users SET name = :name,email =:email,phone = :phone WHERE id=:id");
        
        // bind the parameters 
        $this->db->bind(":name",$data['name']);
        $this->db->bind(":email",$data['email']);
        $this->db->bind(":phone",$data['phone']);
        $this->db->bind(":id",$data['id']);

        // excute
        if($this->db->execute()){
            return true;
        }
        else {
            return false;
        }
    }

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