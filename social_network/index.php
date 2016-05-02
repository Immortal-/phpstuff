<?php
  include( "includes/header.php" );
?>
<?php
  $register = @$_POST['register'];
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
  $fname = strip_tags(@$_POST['fname']);
  $lname = strip_tags(@$_POST['lname']);
  $uname = strip_tags(@$_POST['uname']);
  $email = strip_tags(@$_POST['email']);
  $email2 = strip_tags(@$_POST['email2']);
  $password = strip_tags(@$_POST['password']);
  $password2 = strip_tags(@$_POST['password2']);
  $signup_date = date("Y-m-d");

  if ($register) {
    if ($email == $email2) {
      $username_check = mysqli_query('SELECT username FROM users WHERE username = "$uname"';
      $row = mysql_num_rows($username_check);
      if ($row == 0) {
        if (isset($fname&&$lname&&$uname&&$email&&$email2&&$password&&$password2)) {
          if ($password == $password2) {
            if (strlen($username)>25||strlen($fname)>25||strlen(lname)>25) {
              echo "The maximum limit for username/first name/ last name is 25 characters!";
            } elseif (strlen($password)>30||strlen($password)<5) {
                echo "Your password must be between 5 and 30 characters long!";
            } else {
              $password = password_hash($password)
              $password2 = password_hash($password2)
              $query = mysqli_query('INSERT INTO users VALUES ("","$uname","$fname","$lname","$email","$password","$signup_date","0")');
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
