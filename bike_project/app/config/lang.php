<?php

    session_name("user");
            
    session_start() != FALSE or die("Could not start session");

    if(!isset($_SESSION['lang']))
    {
    $_SESSION['lang']="en";
    }
    else if(isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang']))
    {
    if($_GET['lang']=="en"){
    $_SESSION['lang']="en";
    }else if ($_GET['lang']=="fr")
    {
    $_SESSION['lang']="fr" ;
    }
    }

    echo "choosen language : ".$_SESSION['lang'];

    
   

?>
