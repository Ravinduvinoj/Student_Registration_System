<!DOCTYPE html>
<html lang="en">
<?php
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');


?>

<head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width-device-width, initial-scale=1.0" />
     <title>home</title>

     <!-- Css-->
     <link rel="stylesheet" href="style.css">
     <!--Unicons-->
     <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
     <style>

.nnnn{
    margin: 0;
    padding:0;
    width:100%;
    height:100vh;
    font-family: sans-serif;
}
.section_top{
    width: 100%;
    height: 100%;
    overflow:hidden;
    position:relative;
    background-image:url(imag1.jpg);
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    text-align:center;
    justify-content:center;
    animation:change 10s infinite ease-in-out;
}
.content{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%, -50%);
    text-transform:uppercase;
}
.content h1{
    color:#fff;
    font-size:60px;
    letter-spaling:15px;
}
.content h3{
    color:#fff;
    font-size:20px;
    letter-spaling:5px;
}
.content a{
    background: #85c1ee;
    padding: 10px 24px;
    text-decoration:none;
    font-size:18px;
    border-radius: 20px;
}
.content a:hover{
    background:#034e88;
    color#fff;
}
@keyframes change{
    0%{
        background-image:url(imag1.jpg);
    }
    25%{
        background-image:url(imag2.jpg);
    }
    50%{
        background-image:url(imag3.jpg);
    }
    75%{
        background-image:url(imag4.jpg);
    }
    100%{
        background-image:url(imag5.jpg);
    }

}
     </style>
</head>
<nav class="nav">
     <a class="logo" href="#">Students</a>
     <ul class="nav-links">
          <li><a class="active" href="home.php">Home</a></li>
          <li><a href="Aboutus.php">About us</a></li>
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
<section class="nnnn">
<div class="section_top">
    <div class="content">
    <h1>global acadamy</h1>
    <h3>The world is a book and those who do not travel<br> read only one page</h3><br><br>
    <a href="Cources.php">Courses</a>
    </div>
</div>
</section>

<body>






</body>













</html>