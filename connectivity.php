<?php
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ALL);
?>

<?php
  define('DB_HOST', 'localhost');
  define('DB_NAME', 'UserName');
  define('DB_USER', 'root');
  define('DB_PASSWORD', 'Darcey123');

  $connect = @mysqli_connect ('localhost', 'root', 'Darcey123', 'UserName');
  //$db = mysql_select_db(UserName, $connect);

  function SignIn() {
    @session_start(); // starting the session for user profile

    if(!empty($_POST['user'])){
      $query = @mysqli_query("SELECT * FROM UserName where userName = '$_POST[user]' AND password = '$_POST[password]'");
      $row = @mysqli_fetch_array($query);
      if(!empty($row['userName']) AND !empty($row['password'])) {
        $_SESSION['userName'] = $row['password'];
        echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
      } else {
        echo "SORRY, YOU ENTERED THE WRONG USERNAME OR PASSWORD. PLEASE TRY AGIAN.";
      }
    }
  }
  if(isset($_POST['submit'])) {
    SignIn();
  }
?>
