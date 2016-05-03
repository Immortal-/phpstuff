<?php
  error_reporting(E_ALL); ini_set('display_errors', '1');

  if (!$register) {
    goto RENDER;
  }

  $register = isset($_POST['register']);

  //assigning variables for the registration form
  $fname = mysqli_real_escape_string($db, isset($_POST["fname"]));
  $lname = mysqli_real_escape_string($db, isset($_POST["lname"]));
  $uname = mysqli_real_escape_string($db, isset($_POST["uname"]));
  $email = mysqli_real_escape_string($db, isset($_POST["email"]));
  $email2 = mysqli_real_escape_string($db, isset($_POST["email2"]));
  $password = mysqli_real_escape_string($db, isset($_POST["password"]));
  $password2 = mysqli_real_escape_string($db, isset($_POST["password2"]));
  $signup_date = date("Y-m-d");

  if ($register) {
    if ($email == $email2) {
      $username_check = mysqli_query($db, "SELECT username FROM users WHERE username = '$uname'");
      $row = mysqli_num_rows($username_check);
      if ($row == 0) {
        if ($fname&&$lname&&$uname&&$email&&$email2&&$password&&$password2) {
          if ($password == $password2) {
            if (strlen($uname)>25||strlen($fname)>25||strlen($lname)>25) {
              echo "The maximum limit for username/first name/ last name is 25 characters!";
            } else {
              $password = password_hash($password, PASSWORD_DEFAULT);
              $query = mysqli_query($db, "INSERT INTO users VALUES ('','$uname','$fname','$lname','$email','$password','$signup_date','0')");
              die("<h2>Welcome to HackerBits</h2>Login to your account to get started . . . ");
            }
          } else {
            echo "Your passwords don't match!";
          }
        } else {
          echo "Please fill in all of the fields.";
        }
      } else {
        echo "Username already taken . . . ";
      }
    } else {
      echo "Your emails don't match!";
    }
  }

  RENDER:
    include( "includes/header.php" );
    include( "includes/body.php" );
    include( "includes/footer.php" );
  ?>
