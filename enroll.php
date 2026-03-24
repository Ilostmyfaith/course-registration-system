<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "course_registration";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

    
    $stmt = $conn->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (?, ?);");
    $stmt->bind_param("ii", $student_id, $course_id);

    if ($stmt->execute()) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>