<?php

 class Search extends Controller
 {
    public function __construct()
    {
        //define instance to connect with DB
        $this->usersModel = $this->model('usersModels');
    }

    public function index()
    {
        $uservalid = new userValidation(); 
        $uservalid->startSession();
        
        //check if search key is not empty 
        if(!empty($_GET['search']))
        {
           $filtervalue = $_GET['search'];
           $search_result=['values'=>$this->usersModel->searchProduct($filtervalue)];
           $this->view('Search_Value/show_search_result',$search_result);
         
        }else{
            header ("location: ".URL_ROOT."Home");
        }
    }
 }