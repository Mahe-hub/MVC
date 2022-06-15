<?php
// this file will contain db conection 

class Models{
// define vairables
private $localhost = DB_HOST;
private $dbname = DB_NAME;
private $dbuser = DB_USER;
private $dbpasswd = DB_PASSWD;

public $DBH;
private $error;
private $stmt;
/*define option vairable which use it to use PDO arttributes to check the connection and try connect again to db 
  if conection failed , and also anthor attribute to get the exception not fatal error
*/

  public function __construct()
  {      

    $options = array(PDO::ATTR_PERSISTENT => true,
                    PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION);

    // define the data source name 
    $dsn = "mysql:host=".$this->localhost.";dbname=".$this->dbname.";";


  // do the conection within try and catch to get the exception if exsist
    try
    {
    $this->DBH = new PDO($dsn,$this->dbuser,$this->dbpasswd,$options);
    }
    catch(PDOException $e)
    {
      $this ->error = $e->getmessage();
      echo "<br>something went wrong ".$this ->error."<br>";
    }
 }


  //prepare the statment through function to use it every time 
  public function query($sql)
  {
     $this->stmt = $this->DBH->prepare($sql);
  }

  // bind the value to sure that the value parameter type match DB input data type 
  public function bind($param,$value,$type = null)
  {
    
      if(is_null($type))
      {
          switch(true)
          { 
              case is_int($value) :
              $type = PDO::PARAM_INT;
              break;

              case is_bool($value) :
              $type = PDO::PARAM_BOOL;
              break;

              case is_null($value) :
              $type = PDO::PARAM_NULL;
              break;

              default:
              $type = PDO::PARAM_STR;
            }

        }
      // now bind the value 
      $this->stmt->bindValue($param,$value,$type);  
  }


    // execute the statment return the execute value which 
    // decate if executed true of false

      public function execute()
      {
        return  $this->stmt->execute();
      }


    // fetch the data 
      public function getAllData()
      {
          // excute the statment
          $this->execute();
          // get the data and return to model
          return $this->stmt->fetchAll(PDO::FETCH_OBJ);
      }


      // fetch single data
      public function getSingleData()
      {
          $this->execute();
          return $this->stmt->fetch(PDO::FETCH_OBJ);

      }
}










?>