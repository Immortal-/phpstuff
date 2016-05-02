<?php
  include( "includes/header.php" );
error_reporting(E_ALL); ini_set('display_errors', '1');
  $register = isset($_POST['register']);
  //declaring variables needed for the registration form to prevent errors
  $fname = "";
  $lname = "";
  $uname = "";
  $email = "";
  $email2 = "";
  $password = "";
  $password2 = "";
  $signup_date = "";
  $username_check = ""; // check if username exists
  //assigning variables from the registration form
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
              $password2 = password_hash($password2, PASSWORD_DEFAULT);
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
?>
  <div class="main_table">
    <table>
      <tr>
        <td width="60%" valign="top">
          <h2>Join HackerBits Today!</h2>
        </td>
        <td width="40%" valign="top">
          <h2>Sign Up Below!</h2><br />
          <form action="#" method="post">
            <input type="text" name="fname" size="25" placeholder="First Name"> <br /><br />
            <input type="text" name="lname" size="25" placeholder="Last Name"><br /><br />
            <input type="text" name="uname" size="25" placeholder="Username"><br /><br />
            <input type="text" name="email" size="25" placeholder="Email"><br /><br />
            <input type="text" name="email2" size="25" placeholder="Confirm Email"><br /><br />
            <input type="text" name="password" size="25" placeholder="Password"><br /><br />
            <input type="text" name="password2" size="25" placeholder="Confirm Password"><br /><br />
            <input type="submit" name="register" value="Sign Up!"><br />
          </form>
        </td>
      </tr>
    </table>
  </div>
  <?php
    include( "includes/footer.php" );
  ?>
