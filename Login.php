<!DOCTYPE html>
<html lang="en">
<?php
include_once(__DIR__ . "/../Student Registration System/logic/signuplogic.php");
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');
session_start();
$_SESSION['currentpage']='login_Page';

//include_once("../logic/signuplogic.php");
 ?>

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width-device-width, initial-scale=1.0" />
     <title>Login</title>
     <!-- Css-->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="login.css">
     <!--Unicons-->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<nav class="nav">
     <a class="logo" href="#">Students</a>
     <ul class="nav-links">
          <li><a href="home.php">Home</a></li>
          <li><a href="Aboutus.php">About us</a></li>
          <li><a href="Cources.php">Cources</a></li>
          <li><a href="Signup.php">Signup</a></li>
          <li><a class="active" href="Login.php">Login</a></li>
       
     </ul>
</nav>

<body>
     <section class="sign">
          <form action="logic/loginLogic.php" method="post">
               <label for="username">Username:</label>
               <input type="text" id="username" name="username" required>


               <label for="password">Password:</label>
               <input type="password" id="password" name="password" required>

               <button type="submit" name="sub">Login</button>
               Don’t you have an account?
               <a href="Signup.php">Sign up</a>
          </form>
     </section>





</body>




</html>