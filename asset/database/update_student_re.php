<?php
// Include database connection
include('connection.php');

// Get the data from the AJAX request
$enrollment = isset($_POST['enrollment']) ? $_POST['enrollment'] : '';
$is_active = isset($_POST['is_active']) ? $_POST['is_active'] : 0;

if ($enrollment !== '') {
    // Update the user's status in the database
    $updateQuery = "UPDATE student_add SET is_active = ? WHERE enrollment = ?";
    $stmt = $con->prepare($updateQuery);
    $stmt->bind_param('is', $is_active, $enrollment); // 'is' => Integer and String
    if ($stmt->execute()) {
        echo 'Success';  // If update is successful
    } else {
        echo 'Error';  // If there was an error updating the database
    }
    $stmt->close();
} else {
    echo 'Invalid enrollment data.';
}
?>
