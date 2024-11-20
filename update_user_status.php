<?php
// Assuming you have a login form that sends the username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Fetch the user record from the database
$sql = "SELECT * FROM student_add WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    // Check if the user is active
    if ($user['is_active'] == 0) {
        echo 'Your account is inactive. Please contact the admin.';
    } else {
        // Allow login
        echo 'Login successful!';
        // Set session variables or redirect to the dashboard
    }
} else {
    echo 'Invalid username or password.';
}
?>
