<?php
    include("../database/login_fun.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Student User</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/ec51b9d2d0.js" crossorigin="anonymous"></script>
    <!-- css -->
     <link rel="stylesheet" href="../css/admin_user.css">
</head>
<body>
    <div class="container-fluid" id="admin_cf">
        <div class="container py-5">
            <div class="col-4 mx-auto form-container py-4">
                <div class="col mx-auto admin_item text-center" >
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="col mx-auto">
                    <h2 class="text-center" id="content">Student</h2>
                </div>
                <hr>
                <!-- <form action=""> -->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="col"  id="admin_input">
                        <label for="username">Username</label>
                        <div  class="input-group form_input">
                            <input type="username" name="username" placeholder="Username">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <label for="username " class="pt-3">Password</label>
                        <div class="input-group form_input">
                            <input type="password" name="password" placeholder="password">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <div class="input-group form_input1 pt-4">
                            <input type="submit" value="login" name="stu_login"  class="btn btn-primary">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- <script src="../js/change_fun.js"></script> -->
</body>
</html>