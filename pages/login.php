<?php 
require "../php/db_connect.php";

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/lakerslogo.png" type="image/png">
   <link rel="stylesheet" href="../css/login.css">
   <link rel="stylesheet" href="../css/style.css">
   
    <title>Log In</title>
</head>
<body>
  <?php
  include "../includes/header.php";
  ?>
<div class="login-wrapper">

<form method="POST" action="../php/login-user.php" class="login-form">
  <h2 style="color: purple;">Login</h2>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
  </div>
  <h3 class="message">
    <?php 
    if(isset( $_SESSION['message'])){
      echo  $_SESSION['message'];
    }
    ?>
  </h3>
  <button type="submit">Login</button>
  <h4>Don't have an account? <span class="open-register">Register</span></h4>
</form>
</div>
   

<div class="register-wrapper hide">
<form method="POST" action="../php/create-user.php" class="register-form">
  <h2 style="color: purple;">Register</h2>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
  </div>
  <h3 class="message">
    <?php 
    if(isset( $_SESSION['message'])){
      echo  $_SESSION['message'];
    }
    ?>
  </h3>
  <button type="submit">Register</button>
  <h4>Already have an account? <span class="open-login">Login</span></h4>
</form>
</div>

    
</body>
<script src="../js/login.js"></script>
</html>