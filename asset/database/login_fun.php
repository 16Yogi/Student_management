<?php
include("connection.php");
function login_admin(){
    global $con; 

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $selectAdmin = "SELECT * FROM admin_user WHERE email = '$username'";
        $selectResult = mysqli_query($con, $selectAdmin);

        if ($selectResult && mysqli_num_rows($selectResult) > 0) {
            $row = mysqli_fetch_assoc($selectResult);

            $adminEmail = $row['email'];
            $adminPassword = $row['password'];

            if ($username === $adminEmail && $password === $adminPassword) {
                
                session_start();
                $_SESSION['user_name'] = $username;
                $userid = $_SESSION['user_name'];
                

                echo "<script>alert('Login successful');</script>";
                echo "<script>location.href='../../index.php';</script>";
            } else {
                echo "<script>alert('Username or password does not match');</script>";
                echo "<script>location.href='../../Home.php';</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
            echo "<script>location.href='../../Home.php';</script>";
        }
    }
}

login_admin();


function stu_login(){
    global $con; 

    if(isset($_POST['stu_login'])){
        $Stu_Username = $_POST['username'];
        $Stu_Password = $_POST['password'];
        // echo "$Stu_Username,$Stu_Password";

        $selectStu = "SELECT * FROM student_add WHERE email = '$Stu_Username'";
        $selectRel = mysqli_query($con,$selectStu);
        if($row=mysqli_fetch_assoc($selectRel)){
            $stuEmail = $row['email'];
            $stuPass = $row['password'];
            // echo "$stuEmail,$stuPass";
            if($Stu_Username == $stuEmail && $Stu_Password == $stuPass){
                session_start();
                $_SESSION['stu_user_name'] = $Stu_Username;
                $stu_userid = $_SESSION['stu_user_name'];
                
                echo "<script>alert('login successfull')</script>";
                echo "<script>location.href='../../student.php';</script>";
            }else{
                echo "<script>alert('Username or password does not match');</script>";
                echo "<script>location.href='../../Home.php';</script>";
            }
        } else{
            echo "<script>alert('User not found');</script>";
            echo "<script>location.href='../../Home.php';</script>";
        }
    }
}
stu_login();
?>