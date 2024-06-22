<?php
# create database connection
$Connect = mysqli_connect("localhost", "root", "", "srs_system");

// checking password
if (!empty($_POST["password11"]) && !empty($_POST["password22"])) {
  $pass1 = $_POST["password11"];
  $pass2 = $_POST["password22"];

  if ($pass1 == $pass2) {
    echo "<span style='color:green'> Passwords match</span>";
    echo "<script>$('#signupp').prop('disabled', false);</script>";
  } else {
    echo "<span style='color:red'> Passwords do not match</span>";
    echo "<script>$('#signupp').prop('disabled', true);</script>";
  }
} else if (!empty($_POST["password11"])) {
  echo "<span style='color:red'> Please enter both passwords</span>";
  echo "<script>$('#signupp').prop('disabled', true);</script>";
} else if (!empty($_POST["password22"])) {
  echo "<span style='color:red'> Please enter both passwords</span>";
  echo "<script>$('#signupp').prop('disabled', true);</script>";
} else {
  echo "<script>$('#signupp').prop('disabled', false);</script>";
}

//checking user name
if (!empty($_POST["username"])) {
  $query = "SELECT * FROM login WHERE UserName='" . $_POST["username"] . "'";
  $result = mysqli_query($Connect, $query);
  $count = mysqli_num_rows($result);
  if ($count > 0) {
    echo "<span style='color:red'> Sorry User already exists .</span>";
    echo "<script>$('#signupp').prop('disabled',true);</script>";
  } else {
    //  echo "<span style='color:green'> User available for Registration .</span>";
    echo "<script>$('#signupp').prop('disabled',false);</script>";
  }
}

//checking email 
if (!empty($_POST["email2"])) {
  $query = "SELECT * FROM login WHERE Email='" . $_POST["email2"] . "'";
  $result = mysqli_query($Connect, $query);
  $count = mysqli_num_rows($result);
  if ($count > 0) {
    echo "<span style='color:red'> Sorry Email already used .</span>";
    echo "<script>$('#signupp').prop('disabled',true);</script>";
  } else {
    //  echo "<span style='color:green'> User available for Registration .</span>";
    echo "<script>$('#signupp').prop('disabled',false);</script>";
  }
}

//checking  register form validation



?>