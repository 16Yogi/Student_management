<!-- insert include -->
<?php
    include("../database/insert.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ec51b9d2d0.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin_reg.css">
</head>
<body>
    <div class="container-fluid py-4" id="reg_cf">
        <div class="container py-0">
            <div class="col-8 mx-auto reg_form py-4">
                <div class="item">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="col">
                    <h2 class="text-center">Admin Registration</h2>
                </div>
                <hr>
                <form action="" method="POST" onsubmit="return checkfun()">
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" placeholder="Full name" id="fullname" name="name">
                            <div class="error text-danger font-weight-bold"></div>
                        </div>
                        <div class="col">
                            <label for="pic">Profile Picture</label>
                            <input type="file" class="form-control" id="pic" name="pic">
                            <div class="error text-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                            <div class="error text-danger font-weight-bold"></div>
                        </div>
                        <div class="col">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" placeholder="Mobile" id="mobile" name="mobile">
                            <div class="error text-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <select name="department" id="department" class="form-control">
                            <option value="">Select Department</option>
                            <option value="cs">CS</option>
                            <option value="science">Science</option>
                            <option value="art">Art</option>
                            <option value="vocational">Vocational</option>
                            <option value="management">Management</option>
                        </select>
                    </div>
                    <div class="form-row form-group">
                        <label class="pr-3">Gender:</label>
                        <div class="form-check">
                            <input type="radio" name="gender" id="gender_male" value="male" class="form-check-input">
                            <label for="gender_male" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="gender" id="gender_female" value="female" class="form-check-input">
                            <label for="gender_female" class="form-check-label">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Full Address" id="address" name="address">
                    </div>
                    <div class="form-row form-group">
                        <div class="col">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password1" id="password1">
                            <div class="error text-danger font-weight-bold"></div>
                        </div>
                        <div class="col">
                            <label for="password2">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="password2" id="password2">
                            <div class="error text-danger font-weight-bold"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" name="submit" class="btn btn-info submit_btn py-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/admin_reg.js"></script>
</body>
</html>
