<?php
// student user logout
// echo "Hello";
function logout_student(){
    session_start(); 
    if(isset($_SESSION['stu_user_name'])){
        $_SESSION = [];
        if(ini_get("session.use_cookie")){
            $params = session_get_cookie_params();
            setcookie(session_name(),'',time() - 42000,
                $params["path"],$params["domain"],$params["secure"],$params["httponly"]
            );
        }
        session_destroy();
        header("Location:../../Home.php");
        exit;
    }else{
        echo "<script>alert('user is login')</script>"; 
    }
}
logout_student();
?>