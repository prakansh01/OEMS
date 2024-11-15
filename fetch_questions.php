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

// Fetch 10 questions from Questions table
$sql = "SELECT id, question_text, option_1, option_2, option_3, option_4 FROM Questions LIMIT 10";
$result = $conn->query($sql);

$questions = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $questions[] = array(
            'id' => $row['id'],
            'text' => $row['question_text'],
            'options' => array($row['option_1'], $row['option_2'], $row['option_3'], $row['option_4'])
        );
    }
}

echo json_encode($questions);
$conn->close();
?>
