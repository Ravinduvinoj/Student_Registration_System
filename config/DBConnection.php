<?php
class DBConnection
{
     public $db;
     public function __construct()
     {
          $dbServerName = "localhost";
          $dbUserName = "root";
          $dbPassword = "";
          $dbName = "srs_system";

          $this->db = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
          if (!$this->db) {
               die("connection failde" . mysqli_connect_error());
          }
        //  echo "successfully";


     }
     public function getConnection(){
          return $this->db;
     }
}

?>