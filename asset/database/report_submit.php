<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enrollment = mysqli_real_escape_string($con, $_POST['enrollment']);
    $report_title = mysqli_real_escape_string($con, $_POST['report_title']);
    $report_comment = mysqli_real_escape_string($con, $_POST['report_comment']);

    $sql = "INSERT INTO report (enrollment, report_title, report_comment) 
            VALUES ('$enrollment', '$report_title', '$report_comment')";

    if (mysqli_query($con, $sql)) {
        echo json_encode(["message" => "Report submitted"]);
    } else {
        echo json_encode(["message" => "Sorry! Your report was not submitted"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}
?>
