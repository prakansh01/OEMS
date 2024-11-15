<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO exams (subject, questions, marks_correct, marks_wrong, marks_unattempted, duration, reg_start, reg_end, admit_card_issue, admit_card_expire, exam_start, exam_end, teacher_name, teacher_id, venue, student_code, max_students, syllabus, extra_1, extra_2) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("siiidsssssssssssissss", 
    $_POST['subject'], $_POST['questions'], $_POST['marks_correct'], 
    $_POST['marks_wrong'], $_POST['marks_unattempted'], $_POST['duration'], 
    $_POST['reg_start'], $_POST['reg_end'], $_POST['admit_card_issue'], 
    $_POST['admit_card_expire'], $_POST['exam_start'], $_POST['exam_end'], 
    $_POST['teacher_name'], $_POST['teacher_id'], $_POST['venue'], 
    $_POST['student_code'], $_POST['max_students'], $_POST['syllabus'], 
    $_POST['extra_1'], $_POST['extra_2']);

// Execute the statement
if ($stmt->execute()) {
    echo "New exam created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
