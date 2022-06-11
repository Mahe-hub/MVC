<?php
require_once 'core/App.php';
require_once 'core/Controller.php';
require_once 'config/config.php';
// add the model class
require_once 'core/Models.php';
// define instance to check the db connection 
$model = new Models;


// use the method sql_autoload_register which load all the classes in the core file 
// spl_autoload_register(function($className){
//     require_once 'core/'.$className.'.php';
// });


?>