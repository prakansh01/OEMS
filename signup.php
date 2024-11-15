<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "online_exam_db"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling Registration
if (isset($_POST['register'])) {
    $new_username = $_POST['new_username'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT); // Hash the password
    $user_type = $_POST['user_type'];

    // Insert data into the database
    $sql = "INSERT INTO users (username, password, user_type) VALUES ('$new_username', '$new_password', '$user_type')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect based on user type
        if ($user_type == 'Student') {
            header("Location: student_dashboard.html");
            exit(); // Terminate script after redirection
        } elseif ($user_type == 'Teacher') {
            header("Location: teacher_dashboard.html");
            exit();
        } elseif ($user_type == 'Admin') {
            header("Location: admin_dashboard.html");
            exit();
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handling Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful, store user data in session
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_type'] = $row['user_type'];

            // Redirect based on user type
            if ($row['user_type'] == 'Student') {
                header("Location: student_dashboard.html");
                exit();
            } elseif ($row['user_type'] == 'Teacher') {
                header("Location: teacher_dashboard.php");
                exit();
            } elseif ($row['user_type'] == 'Admin') {
                header("Location: admin_dashboard.html");
                exit();
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
