<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Password is empty
$database = "studentmanagement"; // Your database name

// Create connection
$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

?>