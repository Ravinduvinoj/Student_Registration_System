<!DOCTYPE html>
<html lang="en">
<?php
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');


?>

<head>
     <style>

          .heding{
               font-family: Arial, sans-serif;
               margin: 0;
               padding: 0;
               background-image: url(imagbg.jpg);
               background-position: center;
               background-repeat: no-repeat;
               background-size: cover;
               color: #333;
          }
          header {
               background-color: #134be4;
               color: #fff;
               padding: 1em;
               text-align: center;
          }

          .aboi {
               
               max-width: 800px;
               margin: 20px auto;
               padding: 20px;
               background-color: #e3dac9;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          }



          .aboi h2 {
               color: #333;
          }

          .aboi h2 p {
               line-height: 1.6;
          }

          footer {
               background-color: #134be4;
               color: #fff;
               text-align: center;
               padding: 1em;
               position: fixed;
               bottom: 0;
               width: 100%;
          }
     </style>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width-device-width, initial-scale=1.0" />
     <title>home</title>

     <!-- Css-->
     <link rel="stylesheet" href="style.css">
     <!--Unicons-->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
<nav class="nav">
     <a class="logo" href="#">Students</a>
     <ul class="nav-links">
          <li><a href="home.php">Home</a></li>
          <li><a class="active" href="Aboutus.php">About us</a></li>
          <li><a href="Cources.php">Cources</a></li>
          <?php
          session_start();
          if ($_SESSION['usertype'] == 'user') {
               echo ' <li><a href="logout.php">Log out</a></li>';
          } else
               if ($_SESSION['usertype'] == 'admin') {
                    echo ' <li><a href="Dashboard.php">Dashboard</a></li>';
                    echo ' <li><a href="logout.php">Log out</a></li>';
                    ;
               } else {
                    echo '<li><a href="Signup.php">Signup</a></li>
                    <li><a href="Login.php">Login</a></li>';
               }


          ?>
     </ul>
</nav>


<br>
<br>
<br>
<section class="heding">



<header>
     <h1>About Us</h1>
</header>
<br>
     <br>
     <br>
<br>
<br>
<br>
<section class="aboi">
     
     <h2>Our Story</h2>
     <p>For over 5 years Global Academy has been one of the Academy in Sri Lanka with two branches island wide,
          producing and offering diplomas over 400 students annually under the expert
          guidance of our dynamic, well-educated team of lecturers.

          We believe every student has unlimited potential for growth and personal development. We at Global
          Academy unlock that potential, grabbing the hearts, minds and the commitment of the students.
          We fully respect this intangible human ability and harness it, which is why we are the most respected
          educational organization in Sri Lanka.

     </p>

     <h2>Our Mission</h2>
     <p> Our mission is to provide affordable courses of the highest quality, equipping our students with the
          necessary skills and fluency, thereby enhancing their future career prospects.
          Not only do we provide the highest-quality training but we also equip our students with valuable life
          skills. We give knowledge for realize their dreams and get their ideal job</p>
</section>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
</section>



</body>


</html>