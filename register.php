<?php

$connect = mysqli_connect("localhost", "root", "", "srs_system");
if (!$connect) {
	die("connection failed");
}
echo "Successfully connection";
mysqli_select_db($connect, "srs_system");
echo "<br>Successfully connected DB";
$a = $_POST['Full_Name'];
$b = $_POST['Birthday_day'];
$c = $_POST['Birthday_Month'];
$d = $_POST['Birthday_Year'];
$birth = $d . "/" . $c . "/" . $b;
$email = $_POST['Email_Id'];
$mobileNo = $_POST['Mobile_Number'];
$gen = $_POST['Gender'];
$Address = $_POST['Address'];
$distric = $_POST['City'];
$zcore = $_POST['txtz'];
$sub01 = $_POST['sub1'];
$grade1 = $_POST['grade1'];
$sub02 = $_POST['sub2'];
$grade2 = $_POST['grade2'];
$sub03 = $_POST['sub3'];
$grade3 = $_POST['grade3'];
$MathResult = $_POST['gradeM'];
$scienceResult = $_POST['gradeS'];
$EnglishResult = $_POST['gradeE'];
//$u=$_POST['course'];

$queryInsert = "INSERT INTO registration(FullName,DateOfBirth,Email,MobileNO,Gender,Address,District) VALUES('$a','$birth','$email','$mobileNo','$gen','$Address','$distric')";
$result = mysqli_query($connect, $queryInsert);
if ($result) {
	// If the insertion was successful
	$regNo = mysqli_insert_id($connect); // Get the last inserted ID
	echo $regNo . "sdsd";
	$insertQUL = "INSERT INTO qualifications(Zcore,RegNo) VALUES ('$zcore','$regNo')";
	$result3 = mysqli_query($connect, $insertQUL);
	if ($result3) {
		// If the insertion was successful

		$insertAL = "INSERT INTO subject_al(Subject1Name, Grade1, Subject2Name, Grade2, Subject3Name, Grade3,RegNo) VALUES ('$sub01','$grade1','$sub02','$grade2','$sub03','$grade3','$regNo')";
		$result2 = mysqli_query($connect, $insertAL);

		$insertOL = "INSERT INTO subject_ol(MathsGrade, ScienceGrade, EnglishGrade,RegNo) VALUES ('$MathResult','$scienceResult','$EnglishResult','$regNo')";
		$result1 = mysqli_query($connect, $insertOL);
		if ($result2 && $result1) {
			echo '<script>
				   alert("Successfully INSERT");
				   window.location.href = "Cources.php";
				 </script>';
		} else {
			echo "error :" . mysqli_error($connect);
		}

	} else {
		echo "Error2: " . mysqli_error($connect);
	}


} else {
	echo "Error1: " . mysqli_error($connect);
}

?>