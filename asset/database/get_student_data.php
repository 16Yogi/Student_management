<?php
include('connection.php');
if (isset($_POST['enrollment'])) {
    $enrollment = mysqli_real_escape_string($con, $_POST['enrollment']);
    
    $sql = "SELECT * FROM student_add WHERE enrollment = '$enrollment'";
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
        echo json_encode($student);  
    } else {
        echo json_encode(['error' => 'Student not found']);
    }
}
?>
