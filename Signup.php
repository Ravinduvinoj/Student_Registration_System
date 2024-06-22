<!DOCTYPE html>
<html lang="en">
<?php
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');
?>

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width-device-width, initial-scale=1.0" />
     <title>Signup</title>

     <!-- Css-->
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="signup.css">
     <!--Unicons-->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
     <style>
          /* Change dissabled Button color  */
          #signupp:disabled {
               background-color: red;
               opacity: 0.5;
          }
     </style>
</head>
<nav class="nav">
     <a class="logo" href="#">Students</a>
     <ul class="nav-links">
          <li><a href="home.php">Home</a></li>
          <li><a href="Aboutus.php">About us</a></li>
          <li><a href="Cources.php">Cources</a></li>
          <li><a class="active" href="Signup.php">Signup</a></li>
          <li><a href="Login.php">Login</a></li>
     </ul>
</nav>
<section class="sign">

     <form action="logic/Signupdata.php" method="post">
          <label for="username">Username:

               <label for="us" class="validate"></label>

          </label>
          <input type="text" id="username" placeholder="Ex:-Johnkumara" name="username" oninput="checkUsername()"
               required>
          <span id="check-username"></span>
          <label for="email">Email:</label>
          <input type="email" id="email" placeholder="Ex:-example@gmail.com" name="email" oninput="checkEmail()"
               required>
          <span id="check-email"></span>
          <label for="password">Password:</label>
          <input type="password" id="password1" name="password" oninput="checkPass()" required>
          <span id="check-Pass"></span>
          <label for="password">Confirm Password:</label>
          <input type="password" id="password2" name="Confirmpassword" oninput="checkPass()" required>


          <button id="signupp" type="submit" name="clickSign">Sign Up</button>
          <br>
          Already have an account? 
          <a href="Login.php">Login now</a>
     </form>
</section>
<!---js added-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
     function checkUsername() {

          jQuery.ajax({
               url: "check_availability.php",
               data: 'username=' + $("#username").val(),
               type: "POST",
               success: function (data) {
                    $("#check-username").html(data);
               },
               error: function () { }
          });
     }
     function checkEmail() {

          jQuery.ajax({
               url: "check_availability.php",
               data: 'email2=' + $("#email").val(),
               type: "POST",
               success: function (data) {
                    $("#check-email").html(data);
               },
               error: function () { }
          });
     }
     function checkPass() {
            jQuery.ajax({
                url: "check_availability.php",
                data: { password11: $("#password1").val(), password22: $("#password2").val() },
                type: "POST",
                success: function (data) {
                    $("#check-Pass").html(data);
                },
                error: function () { }
            });
        }

</script>

<body>

</body>

</html>