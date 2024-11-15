<?php
// Include the database connection file
include 'db.php';

// Set content type to JSON for AJAX response
header('Content-Type: application/json');

// Check if the request is a POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the JSON data sent from the frontend
    $inputData = json_decode(file_get_contents('php://input'), true);
    
    // Extract the data
    $examId = $inputData['examId'];
    $subject = $inputData['subject'];
    $numQuestions = $inputData['numQuestions'];
    $marksCorrect = $inputData['marksCorrect'];
    $marksIncorrect = $inputData['marksIncorrect'];
    $duration = $inputData['duration'];
    $examDate = $inputData['examDate'];
    $teacherName = $inputData['teacherName'];
    $venue = $inputData['venue'];
    $eligibility = $inputData['eligibility'];

    // Prepare SQL query to insert data
    $sql = "INSERT INTO exams (exam_id, subject, num_questions, marks_correct, marks_incorrect, duration, exam_date, teacher_name, venue, eligibility) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param('ssiiiissss', $examId, $subject, $numQuestions, $marksCorrect, $marksIncorrect, $duration, $examDate, $teacherName, $venue, $eligibility);

        // Execute the statement
        if ($stmt->execute()) {
            // Success response
            echo json_encode(['success' => true, 'message' => 'Exam created successfully!']);
        } else {
            // Error response
            echo json_encode(['success' => false, 'message' => 'Error creating exam.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error preparing the statement
        echo json_encode(['success' => false, 'message' => 'Failed to prepare SQL query.']);
    }

    // Close the database connection
    $conn->close();
} else {
    // Error if method is not POST
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
