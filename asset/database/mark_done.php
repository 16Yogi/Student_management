<?php
include('connection.php');

if (isset($_POST['enrollment'])) {
    $enrollment = $_POST['enrollment'];

    $sql = "DELETE FROM report WHERE enrollment='$enrollment'";

    if (mysqli_query($con, $sql)) {
        echo "Report marked as done and removed";
    } else {
        echo "Error removing report: " . mysqli_error($con);
    }
}
?>
