

<?php

// this code only eshtablishes a connection between the webpage and the My SQL database  


$servername = "localhost";  // Change this to your database server
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "your_database";  // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
