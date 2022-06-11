<?php

Class App{

 // define the vairables 
 protected $currentcontroler = 'Home';
 protected $currectmethod = 'index';
 protected $params = [] ;

 // define the constructer 

 public function __construct(){
     // here we will get the url as array contain 
     // controler/method/params
     $url=$this->parseurl();

     // check if the controler is exist 
     if(file_exists('../app/controlles/'.$url[0].'.php')){
         $this->currentcontroler = $url[0];
         unset($url[0]);
     }

     //we will call the controller
     require_once '../app/controlles/'.$this->currentcontroler.'.php';
     $this->currentcontroler = new $this->currentcontroler;

    // check if the method is exist in the controler
    //first we need to check if we have method 
    if(isset($url[1]))
    {
        if(method_exists($this->currentcontroler,$url[1])){
            // save the value to the vairable 
            $this->currectmethod =$url[1];
            // clear the value of url
            unset($url[1]);
        }
    }

    // check if the rest of url array has any parameters
    // for that reason we made the url[0],url[1] equal to null to not contain them in the params

    // here if the url array has value in the url[2] so save them in params if not params equal to empty array 
   $this->params = $url ? array_values($url) : [] ;

    // then we will excute the method 
   call_user_func_array([$this->currentcontroler,$this->currectmethod],$this->params);

 }


 public function parseurl(){
     if(isset($_GET['url'])){
         $url = rtrim($_GET['url'],'/');
         $url = filter_var($url, FILTER_SANITIZE_URL);
         $url = explode('/',$url);
         return $url;
     }
 }


}