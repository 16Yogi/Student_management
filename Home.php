
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/ec51b9d2d0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="asset/css/home.css">
    
</head>
<body>
    <div class="container-fluid py-5" id="home-cf">
        <div class="container">
            <div class="col">
                <h2>Dashboard</h2>
            </div>
            <hr>
            <div class="row py-5 mx-auto">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto mt-2">  
                    <div class="col py-5" id="home-item">
                        <!-- <a href="" class="nav-link"> -->
                            <div class="item">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div class="content">
                                <h3>Student</h3>
                                <hr>
                                <p>
                                    <a href="asset/html/stu_user.php">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        <span>Login</span>
                                    </a>
                                </p>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto mt-2">
                    <div class="col py-5" id="home-item">
                        <!-- <a href="asset/html/admin_user.php" class="nav-link"> -->
                            <div class="item">
                                <i class="fa-solid fa-person-chalkboard"></i>
                            </div>
                            <div class="content">
                                <h3>Teacher</h3>
                                <hr>
                                <p>
                                    <a href="asset/html/admin_reg.php">
                                        <i class="fa-solid fa-plus"></i>
                                        <span>Registration</span>
                                    </a>
                                    <span class="px-3"> | </span>
                                    <a href="asset/html/admin_user.php" onclick="adminfun()">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                        <span>Login</span>
                                    </a>
                                </p>
                            </div>
                        <!-- </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="asset/js/change_fun.js"></script>
</body>
</html>