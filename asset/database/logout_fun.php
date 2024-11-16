<?php
// include("connection.php");
// echo "helol";
// admin user logout
function logout_admin(){
    session_start(); 
    if (isset($_SESSION['user_name'])) {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Location: ../../Home.php");
        exit; 
    } else {
        echo "<script>alert('user is login')</script>"; 
    }
}
logout_admin();
?>

