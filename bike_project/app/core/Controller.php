<?php

Class Controller{
 

    // Invoke the view 
    public function view($name, $data=[]){
        if(file_exists('../app/views/'.$name.'.php')){
            require_once('../app/views/'.$name.'.php');
        }
    }

    public function viewwithtwoParameter($name, $firstParmeter=[],$secondParmeter=[]){
        if(file_exists('../app/views/'.$name.'.php')){
            require_once('../app/views/'.$name.'.php');
        }
    }
    // // this method check if model  exist
    public function model($modelname){
        // reuire the model 
        require_once('../app/models/'.$modelname.'.php');
        // define a new object from the model and return it 
        return new $modelname;
    } 

        
    }
