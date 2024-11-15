<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Online_exam_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO student_response (student_id, question_id, selected_option) VALUES (?, ?, ?)");

$student_id = 12345; // Get this from the session or login

// Loop through POST data to capture the selected options
foreach ($_POST as $question_id => $selected_option) {
    $stmt->bind_param("iis", $student_id, $question_id, $selected_option);
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo "Your responses have been successfully submitted!";
?>
