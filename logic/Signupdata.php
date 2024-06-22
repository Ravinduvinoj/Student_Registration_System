<?php
include_once("../config/DBConnection.php");
include_once("signupLogic.php");
$Dbcon = new DBConnection();
$Connect = $Dbcon->getConnection();
if (isset($_POST['clickSign'])) {
     $uname = $_POST['username'];
     $email = $_POST['email'];
     $pasas = $_POST['password'];
     $c_Pass = $_POST['Confirmpassword'];
     $userType = "user";

     function checkPass($pass, $Cpass)
     {
          if ($pass == $Cpass) {
               return true;
          } else {
               return false;
          }
     }

     $finalPass = checkPass($pasas, $c_Pass);
     echo $finalPass;
     if ($finalPass == true) {
          $sql = "INSERT INTO login(UserName,Password,UserType,Email) VALUES ('$uname','$pasas','$userType','$email')";
          $result = mysqli_query($Connect, $sql);

          if ($result > 0) {
        
               echo '<script>
               window.location.href= "../login.php";
               alert("Signup Sucessfully please login now")
               </script>';
          }

     }
}

?>