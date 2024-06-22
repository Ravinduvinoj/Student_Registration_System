<!DOCTYPE html>
<html lang="en">
<?php
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');


?>
<head>
<meta charset="UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width-device-width, initial-scale=1.0"/>
<title>Cources</title>

<!-- Css-->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="course_info.css">
<!--Unicons-->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<nav class="nav">
     <a class="logo" href="#">Students</a>
     <ul class="nav-links">
          <li><a  href="home.php">Home</a></li>
          <li><a href="Aboutus.php">About us</a></li>
          <li><a class="active" href="Cources.php">Cources</a></li>
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
    
    <br>
    <br><br><br><br>
<body class="courses-container">

<h1 class="headin">Course List</h1>
<br><br>

<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "srs_system";


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT id, name FROM coursess";
$result = $conn->query($query);


if (!$result) {
    die("Query failed: " . $conn->error);
}

if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         echo '<center class="course">';
         echo '<h2>' . $row['name'] . '</h2>';
         echo "<br>";
         echo '<button type="button" class="neeee" data-course-id="' . $row['id'] . '">Show Details</button>';
         
         echo '<div id="courseDetails_' . $row['id'] . '" class="course-details-container"></div>';
         echo '<br><br><button onclick="redirectToRegister()">Apply NOW</button>';
         echo '</center>';
     }
 } else {
     echo "No courses found.";
 }
 
 // JavaScript function to redirect to register.php
 $_SESSION['usertype'];
$_SESSION['user'];
$_SESSION['userid'];
 if($_SESSION['usertype'] == ''){
     $_SESSION['usercheck'] = 1;
     echo '<script>
     function redirectToRegister() {
         window.location.href = "login.php";
     }
 </script>';
 }else{
 echo '<script>
     function redirectToRegister() {
         window.location.href = "registerr.php";
     }
 </script>';
 }

$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      $(document).ready(function() {
    $('.neeee').click(function() {
        var courseId = $(this).data('course-id');
        
        // Hide all course details containers
        $('.course-details-container').hide();

        $.ajax({
            type: 'POST',
            url: 'get_course_details.php', 
            data: { id: courseId },
            dataType: 'json',
            success: function(data) {
                // Show details of the clicked course
                $('#courseDetails_' + courseId).html(
                    '<h2>' + data.name + '</h2>' +
                    '<p>Description: ' + data.description + '</p>' +
                    '<p>Requirement: ' + data.requirement + '</p>' +
                    '<p>Age Range: ' + data.age_range + '</p>' +
                    '<p>Duration: ' + data.duration + '</p>' +
                    '<p>Free: ' + (data.free ? 'Yes' : 'No') + '</p>'
                ).fadeIn();
            },
            error: function() {
                alert('Failed to fetch course details.');
            }
        });
    });
});

    </script>



</body>

<body>
     





</body>

</html>