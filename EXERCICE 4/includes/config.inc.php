<?php

  

    class createCon  {
      var $host = 'localhost';
      var $user = 'root';
      var $pass = '';
      var $dataBase = 'articles';
      var $myconn;
  
      function connect() {
          $con = new mysqli($this->host, $this->user, $this->pass, $this->dataBase);
          if (!$con) {
              die('Could not connect to database!');
          } else {
              $this->myconn = $con;
            }
          return $this->myconn;
      }
  
      function close() {
          mysqli_close($myconn);
          echo 'Connection closed!';
      }
  
  }
    $connection = new createCon();
    $db = $connection ->connect();


?>