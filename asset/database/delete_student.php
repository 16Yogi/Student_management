<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enrollment = mysqli_real_escape_string($con, $_POST['enrollment']);

    $query = "DELETE FROM student_add WHERE enrollment = ?";
    
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $enrollment);
        if (mysqli_stmt_execute($stmt)) {
            echo 'Success'; 
        } else {
            echo 'Error: ' . mysqli_stmt_error($stmt); 
        }
        mysqli_stmt_close($stmt);
    } else {
        echo 'Error: ' . mysqli_error($con); 
    }
    mysqli_close($con);
}
?>
