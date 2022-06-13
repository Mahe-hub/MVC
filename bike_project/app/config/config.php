<?php

  // this file we contain the constance

  // define the app root which is app folder
  define('APP_ROOT',dirname(dirname(__FILE__)));
  /* __file__ will get the full path of file 
    dirname will get the directory of file which is config 
    we added another dirname to get the directory of config which is app and its our a[pp root */

  //define URLROOT which we use to navigate controls and their methods
  define('URL_ROOT','http://localhost/bike_project/');

  //define the site name
  define('SITE_NAME','Maher_website');
  //define BD Vairables
  define('DB_HOST','localhost');
  define('DB_NAME','bikes_inventory');
  define('DB_USER','root');
  define('DB_PASSWD','');

?>
