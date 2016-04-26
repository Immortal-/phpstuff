<?php
  if(!class_exists('DB')){
    class DB {
      public function __construct() {
        $mysqli = new mysqli('localhost', 'root', 'root', 'cms');

        if($mysqli->connect_errno) {
          printf('Connect failed: %s\n', $mysqli->connect_error);
          exit();
        }

        $this->connection = $mysqli;
      }

      public function insert($query) {
        $mysqli = $this->connection;
        $result = $mysqli->query($query);
        return $result;
      }
    }
  }
  
  $db = new DB;
?>
