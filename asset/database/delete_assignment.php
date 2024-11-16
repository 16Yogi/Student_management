<?php
include 'connection.php';  

if (isset($_POST['id']) && isset($_POST['file'])) {
    $assignmentId = (int) $_POST['id'];  
    $assignmentFile = $_POST['file'];  

    $deleteQuery = "DELETE FROM assingment WHERE id = ?";

    if ($stmt = mysqli_prepare($con, $deleteQuery)) {
        mysqli_stmt_bind_param($stmt, 'i', $assignmentId);

        if (mysqli_stmt_execute($stmt)) {
            $filePath = 'assig/' . $assignmentFile;
            if (file_exists($filePath)) {
                unlink($filePath);  
            }
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
