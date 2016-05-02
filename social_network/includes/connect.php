<?php
  try {
      $db = new PDO('mysql:host=localhost;dbname=users_table', 'root', 'Anim8ors');
  } catch (PDOException $error) {
      echo "Error!: " . $error->getMessage() . "<br/>";
      die();
  }
?>
