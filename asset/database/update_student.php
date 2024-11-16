<?php
include 'connection.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enrollment = $_POST['enrollment'];
    $fullname = $_POST['fullname'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];

    $query = "UPDATE student_add 
              SET fullname = ?, fathername = ?, mothername = ?, department = ?, semester = ? 
              WHERE enrollment = ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param("sssssi", $fullname, $fathername, $mothername, $department, $semester, $enrollment);

    if ($stmt->execute()) {
        echo 'Success';
    } else {
        echo 'Error: ' . $stmt->error;
    }
    $stmt->close();
    $con->close();
}


?>