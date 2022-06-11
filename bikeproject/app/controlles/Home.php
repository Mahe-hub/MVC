<?php
Class Home extends Controller{
    public function __construct(){
      
    }

    public function index(){
        // call home view 
        $this->view('Home\home');

    }



  
}