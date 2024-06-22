<?php



$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "srs_system"; 


$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['id'])) {
    $courseId = $_POST['id'];

   
    $query = "SELECT * FROM coursess WHERE id = $courseId";
    $result = $conn->query($query);

    
    if ($result) {
       
        $data = $result->fetch_assoc();

      
        $conn->close();

       
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
       
        echo json_encode(['error' => 'Failed to fetch course details.']);
    }
} else {
    
    echo json_encode(['error' => 'Course ID not provided.']);
}
?>
