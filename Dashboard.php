<html>
<?php
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');
$Dbcon = new DBConnection();
$connect = $Dbcon->getConnection();
?>

<head>
  <style>
    .numm {

      text-align: center;
    }

    #customers {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 94%;

    }

    #customers td,
    #customers th {

      border: 3px solid white;
      padding: 8px;
      border-radius: 8px;

    }

    #customers tr:nth-child(even) {
      background-color: #cfe3fc;
    }

    #customers tr {
      background-color: #cfe3fc;
    }

    #customers tr:hover {
      background-color: #95c3f9;
      transition: 0.5s;
    }

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #4a98f7;
      color: white;
    }

    .abc {
      position: relative;
      left: 1680px;
      transition: 0.5s;
      border-radius: 8px;
    }

    .abc:link,
    .abc:visited {
      background-color: white;
      color: black;
      border: 2px solid #4a98f7;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      color: #4a98f7;
    }

    .abc:hover,
    .abc:active {
      background-color: #4a98f7;
      color: white;
    }
  </style>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width-device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <!-- Css-->
  <link rel="stylesheet" href="styleee.css">
  <link rel="stylesheet" href="style.css">
  <!--Unicons-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<nav class="nav">
  <a class="logo" href="#">Students</a>
  <ul class="nav-links">
    <li><a href="home.php">Home</a></li>
    <li><a href="Aboutus.php">About us</a></li>
    <li><a href="Cources.php">Cources</a></li>
    <li><a class="active" href="Dashboard.php">Dashboard</a></li>
    <li><a href="Logout.php">Log out</a></li>

  </ul>
</nav>
<br>
<br>
<br>
<br><br>
<section>
  <h1 class="numm">Log-in Information</h1><br>
  <center>
    <table id="customers">

      <tr>
        <th>User ID</th>
        <th>User Name</th>
        <th>Password</th>
        <th>User Type</th>
        <th>E-mail</th>

      </tr>

      <tr>
        <?php
        $quary = "SELECT * FROM login";
        $result = mysqli_query($connect, $quary);
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <td>
            <?php echo $row['UserID']; ?>
          </td>
          <td>
            <?php echo $row['UserName']; ?>
          </td>
          <td>
            <?php echo $row['Password']; ?>
          </td>
          <td>
            <?php echo $row['UserType']; ?>
          </td>
          <td>
            <?php echo $row['Email']; ?>
          </td>
        </tr>
        <?php
        }

        ?>
    </table>
  </center>

  <br>
  <b><a class="abc" href="edit.php">Edit Information</a></b>

  <br>
</section>

<body>
<body class="addc">
    <center>
<h1>Course Update Panel</h1></center><br>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="courseinfo">
    
<div id="right">
    <label for="carange">Age Range:</label><br>
    <input type="text" id="f_carange" name="f_carange" ><br><br>

    <label for="cdur">Duration(Weeks):</label><br>
    <input type="text" id="f_cdur" name="f_cdur" ><br><br>

    <label for="cfee">Course Fee:</label><br>
    <input type="text" id="f_cfee" name="f_cfee" ><br><br>

    
    <label for="courses">Select Course:</label><br>
    <select id="courses" name="f_courses_select" size="6"  style="width: 175px;">

    <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srs_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the database
        $sql = "SELECT `codes` FROM `coursess`";
        $result = $conn->query($sql);

        // Check if there are rows in the table
        if ($result -> num_rows > 0) {
            // Generate options based on database data
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['codes'] . "'>" . $row['codes'] . "</option>";
            }
        } else {
            echo "<option value=''>No Courses found</option>";
        }

        // Close connection
        $conn->close();
        ?>

    </select><br><br>

    <button class="nmm" type="submit" name="search">Search</button> 
    <button class="nmm" type="submit" name="add">Add</button>
    <button class="nmm" type="submit" name="update">Update</button>
    <button class="nmm" type="submit" name="delete">Delete</button> 
</div>
<center class="lftxt">
    <label for="cid">CourseID:</label><br>
    <input type="text" id="f_cid" name="f_cid" style="width: 235px;" required><br><br>

    <label for="cname">Course Name:</label><br>
    <textarea rows="2" cols="30" type="text" id="f_cname" name="f_cname" value="f_cname"></textarea><br><br>

    <label for="cdesc">Course Description:</label><br>
    <textarea rows="5" cols="30" type="text" id="f_cdesc" name="f_cdesc"></textarea><br><br>

    <label for="creq">Course Requirments:</label><br>
    <textarea rows="5" cols="30" type="text" id="f_creq" name="f_creq"></textarea><br><br>
    </center>
</form>

<?php
$con = mysqli_connect('localhost', 'root', '','srs_system');

// get the post records
if (isset($_POST['add'])) {
  
$cid=$_POST['f_cid'];
$cname=$_POST['f_cname'];
$cdesc=$_POST['f_cdesc'];
$creq=$_POST['f_creq'];
$carange=$_POST['f_carange'];
$cdur=$_POST['f_cdur'];
$cfee=$_POST['f_cfee'];

    $sql = "INSERT INTO coursess (codes, name, description, requirement, age_range, duration, free)
    VALUES ('$cid', '$cname', '$cdesc', '$creq', '$carange', '$cdur', '$cfee')";

$rs = mysqli_query($con, $sql);

if($rs)
{
    echo "success";
    echo "<meta http-equiv='refresh' content='0'>";
}
else
{
    echo "error: " . $con->error;
}


}

if (isset($_POST['update'])) {
 
$cid=$_POST['f_cid'];
$cname=$_POST['f_cname'];
$cdesc=$_POST['f_cdesc'];
$creq=$_POST['f_creq'];
$carange=$_POST['f_carange'];
$cdur=$_POST['f_cdur'];
$cfee=$_POST['f_cfee'];


    $sql = "UPDATE `coursess` SET name='$cname', description='$cdesc', requirement='$creq', age_range='$carange', duration='$cdur', free='$cfee' WHERE codes='$cid'";
    
    $rs = mysqli_query($con, $sql);

if($rs)
{
    echo "success";
    echo "<meta http-equiv='refresh' content='0'>";
}
else
{
    echo "error: " . $con->error;
}


}


if (isset($_POST['delete'])) {
    
$cid=$_POST['f_cid'];

    $sql = "DELETE FROM `coursess` WHERE codes = '$cid'";

    $rs = mysqli_query($con, $sql);

if($rs)
{
    echo "success";
    echo "<meta http-equiv='refresh' content='0'>";
}
else
{
    echo "error: " . $con->error;
}


}
if (isset($_POST['search'])) {

    $cid=$_POST['f_cid'];
   // Create connection
    $conn = new mysqli("localhost", "root", "", "srs_system");
    $query = "SELECT * FROM `coursess` WHERE codes='$cid' ";
    $query_run = mysqli_query($conn, $query);



    if ($row = mysqli_fetch_array($query_run)) {

       ?>
       <!-- JavaScript to set initial values of textboxes -->
       <script>
           document.getElementById("f_cid").value = "<?php echo $row['codes']; ?>";
           document.getElementById("f_cname").value = "<?php echo $row['name']; ?>";
           document.getElementById("f_cdesc").value = "<?php echo $row['description']; ?>";
           document.getElementById("f_creq").value = "<?php echo $row['requirement']; ?>";
           document.getElementById("f_carange").value = "<?php echo $row['age_range']; ?>";
           document.getElementById("f_cdur").value = "<?php echo $row['duration']; ?>";
           document.getElementById("f_cfee").value = "<?php echo $row['free'];?>";
       </script>
       <?php
   } else {
       // Display a message if no data is found
       echo "No data found for the provided registration number.";
   }
}
   ?>
</body>
</body>




</html>