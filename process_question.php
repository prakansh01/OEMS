<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_exam_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the form submission for adding questions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exam_id = $_POST['exam_id'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct_option = $_POST['correct_option'];

    $sql = "INSERT INTO questions (exam_id, question, option1, option2, option3, option4, correct_option)
            VALUES ('$exam_id', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_option')";

    if ($conn->query($sql) === TRUE) {
        echo "New question added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
