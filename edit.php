<html>
<?php 
include_once(__DIR__ . '/../Student Registration System/logic/loginLogic.php');
$Dbcon = new DBConnection();
$connect = $Dbcon->getConnection();
?>
    <head>
        <title>Dashboard</title>
    <style>
        .hhh{
            background-color:#134be4;
            color:white;
            text-align: center;
        }
        input[type=text]{
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btnsearch{
            background-color: #134be4;
            border:2px solid #48bffc;
            border-radius:4px;
            color: white;
            padding: 7px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .btnupdate{
            background-color: #179612;
            border:2px solid #87f183;
            border-radius:4px;
            color: white;
            padding: 7px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .btndelete{
            background-color: #961212;
            border:2px solid #ed5757;
            border-radius:4px;
            color: white;
            padding: 7px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
        }
        a:link, a:visited{
            background-color:white;
            color:black;
            border:2px solid #134be4;
            padding:10px 20px;
            text-align:center;
            text-decoration:none;
            display:inline-block;
            border-radius: 8px;
            color: #134be4;
        }
        a:hover, a:active{
            background-color:#134be4;
            color:white;
        }       

    </style>
    </head>
    <body>

<h1 class="hhh">Edit Student Information</h1>
<br>
<center>
    <form action="" method="POST">
        <input type="text" name="id" placeholder="Enter User ID"/><br><br>
        <input class="btnn" type="submit" name="search" value="Search" class="btnsearch">
</form>

<?php
if(isset($_POST['search'])){
    $id = $_POST['id'];

    $query = "SELECT * FROM login WHERE UserID='$id' ";
    $query_run = mysqli_query($connect,$query);

    while($row = mysqli_fetch_array($query_run)){
        ?><h2>
        <form action="" method="POST">
        User ID:<br> <input type="text" name="UserID"  value="<?php echo $row['UserID'] ?>" ><br><br>
        User Name :<br> <input type="text" name="UserName" value="<?php echo $row['UserName'] ?>" /><br><br>
        Password :<br> <input type="text" name="Password"  value="<?php echo $row['Password'] ?>" /><br><br>
        E-mail :<br> <input type="text" name="Email" value="<?php echo $row['Email'] ?>" /><br><br>
        <input type="submit" name="update" value="Update Information" class="btnupdate"><br><br>
        <input type="submit" name="delete" value="Delete Record" class="btndelete">
    </form></h2>
        <?php
    }

}
?>
<a href="Dashboard.php">Back to Dashboard</a>
</center>
</body>
</html>

<!--update information-->

<?php


if(isset($_POST['update'])){
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];
    $Email = $_POST['Email'];

    $query = "UPDATE login SET UserName='$_POST[UserName]',Password='$_POST[Password]',Email='$_POST[Email]' WHERE UserID='$_POST[UserID]'";
    $query_run = mysqli_query($connect,$query);
    if($query_run)
    {
        echo ' <script>alert("Information Updated")</script>';
    }
    else
    {
        echo '<script >alert("Information Not Updated") </script>';
    }
}

?>

<!--Delete record-->

<?php

    if(isset($_POST['delete']))
    {
        $id = $_POST['UserID'];

        $query = "DELETE FROM login WHERE UserID='$id' ";
        $query_run = mysqli_query($connect,$query);
        if($query_run)
        {
            if($query_run)
            {
                echo '<script>alert("Record Deleted")</script>';
            }
            else
            {
                echo '<script>alert("Record Not Deleted")</script>';
            }
        }
    }


?>