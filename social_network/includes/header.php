<?php
  include( "connect.php" );
?>
<!doctype html>
<html>
<head>
  <title>HackerBits</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="headerMenu">
    <div id="header_wrapper">
      <div class="logo">
        <h1>HackerBits</h1>
      </div>
      <div class="search_box">
        <form action="search.php" method="get" id="search">
          <input type="text" name="q" size="60" placeholder="Search . . .">
        </form>
      </div>
      <div id="menu">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Sign Up</a>
        <a href="#">Sign In</a>
      </div>
    </div>
  </div>
