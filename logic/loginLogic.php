<?php
include_once(__DIR__ . "/../config/DBConnection.php");
include_once(__DIR__ . "/../logic/signuplogic.php");

$Dbcon = new DBConnection();
$Connect = $Dbcon->getConnection();
if (isset($_POST['sub'])) {
     $uname = $_POST['username'];
     $pass = $_POST['password'];

     $sql = "SELECT* FROM login WHERE UserName='$uname' and Password='$pass'";
     $result = mysqli_query($Connect, $sql);
     $row = mysqli_fetch_array($result);
     $count = mysqli_num_rows($result);
     if ($count == 1) {
          $userID = $row['UserID'];
          $usertype = $row['UserType'];
          $usernm = $row['UserName'];
          session_start();
          $_SESSION['user'] = $usernm;
          $_SESSION['usertype'] = $usertype;
          $_SESSION['userid'] = $userID;

          echo $userID;
          echo $usertype;
          echo $usernm;
          //set the logging information
          session_start();
          if ($_SESSION['usercheck'] == 1) {
               header("Location:../registerr.php");
               $_SESSION['usercheck']='';
          } else {
               header("Location:../home.php");
          }


     } else {
          echo '<script>
          window.location.href= "../login.php";
          alert("Login failed. Invalid username oe password!!!")
          </script>';
     }

}
