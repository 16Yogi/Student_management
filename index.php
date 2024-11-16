<?php
    include("asset/database/insert.php");
    include("asset/database/process_attendance.php");
    // include("asset/database/insert.php");
    // sesstion start
    session_start();
    $usrid = $_SESSION['user_name'];
    // echo $usrid;
    if($usrid==true){
        $selectAdmin = "SELECT * FROM admin_user WHERE email = '$usrid'";
    
        $qryresult = mysqli_query($con, $selectAdmin);
    
        $row = mysqli_fetch_assoc($qryresult);

        $name = $row['fullname'];
        $profilepic = $row['profilepic']; 
        $email = $row['email'];
        $mobile = $row['mobile'];
        $department = $row['department'];
        $gender = $row['gender'];
        $address = $row['address'];
    }else{
        // echo "<srcipt>alert('user not login')</srcipt>";
        echo "<script>location.href='Home.php'</script>";
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="path/to/your/script.js"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/ec51b9d2d0.js" crossorigin="anonymous"></script>
    <!-- css -->
     <link rel="stylesheet" href="asset/css/index.css">
    
</head>
<body>
    <!-- navigation bar -->
    <div class="container-fluid bg-light" id="nav">
        <nav class="navbar navbar-expand-lg navbar-light  d-flex justify">
            <a class="navbar-brand" href="#"><b>Dashboard</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav left">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Date: <span id="date"></span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#"><?php echo $name; ?> <i class="fa-solid fa-angle-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="asset/database/logout_fun.php" class="dropdown-item">Logout</a>
                            <a href="" class="dropdown-item">Profile</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end navigation -->
    <!-- dashboard -->
    <div class="container-fluid py-3 px-4" id="dash-cf">
        <div class="row">
            <div class="col-2 py-2" id="left-side">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active text-left" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button"><i class="fa-solid fa-user pr-3"></i>Profile</button>
                    <button class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" data-target="#v-pills-messages" type="button"><i class="fa-solid fa-user-plus pr-3"></i>Add user</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-meeting" type="button"><i class="fa-solid fa-handshake pr-3"></i>Meeting</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-assignment" type="button"><i class="fa-solid fa-file pr-3"></i>Assignment</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-attendance" type="button"><i class="fa-solid fa-clipboard-user pr-3"></i>Attendance</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-all-user" type="button"><i class="fa-solid fa-users pr-3"></i>Students</button>
                </div>
            </div>
            <div class="col-9 mx-3 py-3 px-4" id="right-side">
                <div class="tab-content " id="v-pills-tabContent">
                    <!-- profile -->
                    <div class="tab-pane fade profile show active   " id="v-pills-profile" role="tabpanel">
                        <div class="row">
                            <div class="col-6">
                                <h1>Profile</h1>
                            </div>
                            <div class="col-6">
                                <h6 class="text-success mt-3 text-right">Active <i class="fa-solid fa-circle"></i></h6>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="col" id="profile">
                            <div class="row">
                                <div class="col-4">
                                    <img src="img4/<?php echo $profilepic; ?>" alt="profilepic" class="img-fluid">
                                </div>
                                <div class="col-8">
                                    <p>
                                        <b>Name:</b>
                                        <span><?php echo $name; ?></span>
                                    </p>
                                    <p>
                                        <b>Email:</b>
                                        <span><?php echo $email; ?></span>
                                    </p>
                                    <p>
                                        <b>Mobile:</b>
                                        <span><?php echo $mobile; ?></span>
                                    </p>
                                    <p>
                                        <b>Gender:</b>
                                        <span><?php echo $gender; ?></span>
                                    </p>
                                    <p>
                                        <b>Address:</b>
                                        <span><?php echo $address; ?></span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="col-2 row mx-auto">
                                <div class="col-6">
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success"><i class="fa-solid fa-pen"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile -->

                     <!-- add user -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel">
                        <h1>Add user</h1>
                        <hr>
                        <div class="col">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" onsubmit="return checkfun()">
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="fullname">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full name">
                                        <div class="error text-danger font-weight-bold"></div>
                                    </div>
                                    <div class="col">
                                        <label for="pic">Profile Photo</label>
                                        <input type="file" class="form-control-file border" id="pic" name="pic">
                                        <div class="error text-danger font-weight-bold"></div>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="father">Father Name</label>
                                        <input type="text" class="form-control" id="father" name="father" placeholder="Father Name">
                                        <div class="error text-danger font-weight-bold"></div>
                                    </div>
                                    <div class="col">
                                        <label for="mother">Mother Name</label>
                                        <input type="text" class="form-control" id="mother" name="mother" placeholder="Mother Name">
                                        <div class="error text-danger font-weight-bold"></div>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="department">Department</label>
                                        <select id="department" class="form-control" name="department">
                                            <option value="">Select Department</option>
                                            <option value="MCA">MCA</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BTech">B.Tech</option>
                                            <option value="MTech">M.Tech</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="semester">Semester</label>
                                        <select id="semester" name="semester" class="form-control">
                                            <option value="">Select Sem</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="enrollment">Enrollment</label>
                                    <input type="text" id="enrollment" name="enrollment" class="form-control" placeholder="Enrollment">
                                    <div class="error text-danger font-weight-bold"></div>
                                </div>
                                <div class="form-row form-group">
                                    <label class="pr-3">Gender:</label>
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="gender_male" value="male" class="form-check-input">
                                        <!-- <input type="radio" class="form-check-input" id="gender-male" name="gender" value="male"> -->
                                        <label class="form-check-label" for="gender-male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="gender_female" value="female" class="form-check-input">
                                        <!-- <input type="radio" class="form-check-input" id="gender-female" name="gender" value="female"> -->
                                        <label class="form-check-label" for="gender-female">Female</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    <div class="error text-danger font-weight-bold"></div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                                    <div class="error text-danger font-weight-bold"></div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Full Address">
                                    <div class="error text-danger font-weight-bold"></div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label for="password1">Password</label>
                                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                        <div class="error text-danger font-weight-bold"></div>
                                    </div>
                                    <div class="col">
                                        <label for="password2">Confirm Password</label>
                                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                                        <div class="error text-danger font-weight-bold"></div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submitstu">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- end add user -->

                    <!-- start meeting -->
                    <div class="tab-pane fade" id="v-pills-meeting" role="tabpanel">
                        <h1>Meeting</h1>
                        <hr>
                        <form action="">
                            <div class="form-group">
                                <label for="meeting">Meeting Name</label>
                                <input type="text" class="form-control" id="meeting" aria-describedby="emailHelp" placeholder="Meeting Name">
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="Department">Department</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select  Department</option>
                                        <option value="">MCA</option>
                                        <option value="">BCA</option>
                                        <option value="">B.Tech</option>
                                        <option value="">M.Tech</option>
                                    </select>
                                </div>
                                <div class="col">
                                <label for="Department">Semester</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select  Sem</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success">Meeting start</button>
                            <button class="btn btn-danger">Meeting end</button>
                        </form>
                    </div>
                    <!-- end meeting -->

                    <!-- start assignment -->
                    <div class="tab-pane fade" id="v-pills-assignment" role="tabpanel">
                        <h1>Assignment</h1>
                        <hr>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST">
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="assignmentTop">Assignment Topic</label>
                                    <input type="text" class="form-control" id="AssignmenTop" name="AssignmenTop" placeholder="Assignment Topic">
                                </div>
                                <div class="col">
                                    <label for="AssignmentFile">Assignment File</label>
                                    <input type="file" class="form-control" id="assignmentFile" name="assignmentFile" placeholder="Assignment file">
                                </div>
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="Department">Department</label>
                                    <select name="department" id="department" class="form-control">
                                        <option value="">Select Department</option>
                                        <option value="MCA">MCA</option>
                                        <option value="BCA">BCA</option>
                                        <option value="B.Tech">B.Tech</option>
                                        <option value="M.Tech">M.Tech</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="Semester">Semester</label>
                                    <select name="sem" id="sem" class="form-control">
                                        <option value="">Select Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success" name="sendAssig">Send Assignment</button>
                            <button class="btn btn-danger" name="delAssig">Delete Assignment</button>
                        </form>
                        <hr>
                        <h2>Uploaded Assignments</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-secondary">
                                    <th scope="col">Topic Name</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Semester</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include 'connection.php';  // Make sure the connection is established
                    
                                    $selectassig = "SELECT * FROM assingment";
                                    $assigqry = mysqli_query($con, $selectassig);
                                    while ($row = mysqli_fetch_assoc($assigqry)) {
                                ?>
                                <tr id="assignment-<?php echo $row['id']; ?>">
                                    <td><?php echo $row['assingmenttop']; ?></td>
                                    <td><a href="assig/<?php echo $row['assingmentfile']; ?>" target="_blank">View File</a></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td><?php echo $row['semester']; ?></td>
                                    <td>
                                        <button class="btn btn-danger delete-assignment" data-id="<?php echo $row['id']; ?>" data-file="<?php echo $row['assingmentfile']; ?>">Delete</button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <script>
                        $(document).ready(function() {
                            // Event listener for delete button
                            $('.delete-assignment').click(function() {
                                var assignmentId = $(this).data('id');  // Get the assignment ID
                                var assignmentFile = $(this).data('file');  // Get the file name
                                var confirmDelete = confirm('Are you sure you want to delete this assignment?');
                    
                                if (confirmDelete) {
                                    // Send AJAX request to delete the assignment
                                    $.ajax({
                                        url: 'asset/database/delete_assignment.php',
                                        type: 'POST',
                                        data: { id: assignmentId, file: assignmentFile },
                                        success: function(response) {
                                            if (response === 'success') {
                                                // Remove the row from the table if deletion is successful
                                                $('#assignment-' + assignmentId).remove();
                                            } else {
                                                alert('Error: Could not delete the assignment.');
                                            }
                                        },
                                        error: function() {
                                            alert('Error: Unable to process the request.');
                                        }
                                    });
                                }
                            });
                        });
                    </script>


                    <!-- end assignment -->
 
                    <!-- start Attendance -->
                    <div class="tab-pane fade" id="v-pills-attendance" role="tabpanel">
                        <h1>Attendance</h1>
                        <hr>
                        <div class="nav flex-row nav-pills" id="v-pills-tab" role="tablist" aria-orientation="horizontal">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-mca" role="tab" aria-controls="v-pills-mca" aria-selected="true">MCA</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-bca" role="tab" aria-controls="v-pills-bca" aria-selected="false">BCA</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-btech" role="tab" aria-controls="v-pills-btech" aria-selected="false">B.Tech</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-mtech" role="tab" aria-controls="v-pills-mtech" aria-selected="false">M.Tech</a>
                        </div>
                        <hr>
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- MCA -->
                            <div class="tab-pane fade show active" id="v-pills-mca" role="tabpanel" aria-labelledby="v-pills-mca-tab">
                                <div class="row py-2">
                                    <div class="col-10">
                                        <h3>MCA</h3>
                                    </div>
                                    <div class="col-2">
                                        <form action="">
                                            <select name="semester" id="semester-mca" class="form-control">
                                                <option value="">Select semester</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <table class="table" id="mca-students-table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th scope="col">Enrollment</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Father Name</th>
                                                <th scope="col">Mother Name</th>
                                                <th scope="col">Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $stuAtt = "SELECT * FROM student_add WHERE department='MCA'";
                                                $stuAttqry = mysqli_query($con, $stuAtt);
                                                while ($row = mysqli_fetch_assoc($stuAttqry)) {
                                            ?>
                                            <tr class="semester-<?php echo $row['semester']; ?>">
                                                <th scope="row"><?php echo $row['enrollment']; ?></th>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['fathername']; ?></td>
                                                <td><?php echo $row['mothername']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <select name="subject_<?php echo $row['enrollment']; ?>" class="form-control">
                                                                <option value="">Select Subject..</option>
                                                                <option value="C++">C++</option>
                                                                <option value="Java">Java</option>
                                                                <option value="Python">Python</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="attendance_<?php echo $row['enrollment']; ?>" class="form-control">
                                                                <option value="">Select Attendance..</option>
                                                                <option value="Present">Present</option>
                                                                <option value="Absent">Absent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" name="mcaStuAtt">Submit</button>
                                </form>


                            </div>
                    
                           <!-- BCA -->
                            <div class="tab-pane fade" id="v-pills-bca" role="tabpanel" aria-labelledby="v-pills-bca-tab">
                                <div class="row py-2">
                                    <div class="col-10">
                                        <h3>BCA</h3>
                                    </div>
                                    <div class="col-2">
                                        <form action="" method="POST">
                                            <select name="semester" id="semester-bca" class="form-control">
                                                <option value="">Select semester</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <table class="table" id="bca-students-table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th scope="col">Enrollment</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Father Name</th>
                                                <th scope="col">Mother Name</th>
                                                <th scope="col">Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stuAtt = "SELECT * FROM student_add WHERE department='BCA'";
                                            $stuAttqry = mysqli_query($con, $stuAtt);
                                            while ($row = mysqli_fetch_assoc($stuAttqry)) {
                                            ?>
                                            <tr class="semester-<?php echo $row['semester']; ?>">
                                                <th scope="row"><?php echo $row['enrollment']; ?></th>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['fathername']; ?></td>
                                                <td><?php echo $row['mothername']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <select name="subject_<?php echo $row['enrollment']; ?>" class="form-control" required>
                                                                <option value="">Select Subject..</option>
                                                                <option value="C++">C++</option>
                                                                <option value="Java">Java</option>
                                                                <option value="Python">Python</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="attendance_<?php echo $row['enrollment']; ?>" class="form-control" required>
                                                                <option value="">Select Attendance..</option>
                                                                <option value="Present">Present</option>
                                                                <option value="Absent">Absent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" name="submit_bca_attendance">Submit</button>
                                </form>
                            </div>

                            <!-- btech -->
                            <div class="tab-pane fade" id="v-pills-btech" role="tabpanel" aria-labelledby="v-pills-btech-tab">
                                <div class="row py-2">
                                    <div class="col-10">
                                        <h3>B.Tech</h3>
                                    </div>
                                    <div class="col-2">
                                        <form action="">
                                            <select name="semester" id="semester-btech" class="form-control">
                                                <option value="">Select semester</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <table class="table" id="bca-students-table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th scope="col">Enrollment</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Father Name</th>
                                                <th scope="col">Mother Name</th>
                                                <th scope="col">Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $stuAtt = "SELECT * FROM student_add WHERE department='BTech'";
                                                $stuAttqry = mysqli_query($con, $stuAtt);
                                                while ($row = mysqli_fetch_assoc($stuAttqry)) {
                                            ?>
                                            <tr class="semester-<?php echo $row['semester']; ?>">
                                                <th scope="row"><?php echo $row['enrollment']; ?></th>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['fathername']; ?></td>
                                                <td><?php echo $row['mothername']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <select name="subject_<?php echo $row['enrollment']; ?>" class="form-control">
                                                                <option value="">Select Subject..</option>
                                                                <option value="C++">C++</option>
                                                                <option value="Java">Java</option>
                                                                <option value="Python">Python</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="attendance_<?php echo $row['enrollment']; ?>" class="form-control">
                                                                <option value="">Select Attendance..</option>
                                                                <option value="Present">Present</option>
                                                                <option value="Absent">Absent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" name="submit_btech_attendance">Submit</button>

                                </form>
                            </div>

                            <!-- mtech -->
                            <div class="tab-pane fade" id="v-pills-mtech" role="tabpanel" aria-labelledby="v-pills-mtech-tab">
                                <div class="row py-2">
                                    <div class="col-10">
                                        <h3>M.Tech</h3>
                                    </div>
                                    <div class="col-2">
                                        <form action="">
                                            <select name="semester" id="semester-mtech" class="form-control">
                                                <option value="">Select semester</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <table class="table" id="bca-students-table">
                                        <thead class="bg-info">
                                            <tr>
                                                <th scope="col">Enrollment</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Father Name</th>
                                                <th scope="col">Mother Name</th>
                                                <th scope="col">Attendance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $stuAtt = "SELECT * FROM student_add WHERE department='MTech'";
                                                $stuAttqry = mysqli_query($con, $stuAtt);
                                                while ($row = mysqli_fetch_assoc($stuAttqry)) {
                                            ?>
                                            <tr class="semester-<?php echo $row['semester']; ?>">
                                                <th scope="row"><?php echo $row['enrollment']; ?></th>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['fathername']; ?></td>
                                                <td><?php echo $row['mothername']; ?></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <select name="subject_<?php echo $row['enrollment']; ?>" class="form-control">
                                                                <option value="">Select Subject..</option>
                                                                <option value="C++">C++</option>
                                                                <option value="Java">Java</option>
                                                                <option value="Python">Python</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <select name="attendance_<?php echo $row['enrollment']; ?>" class="form-control">
                                                                <option value="">Select Attendance..</option>
                                                                <option value="Present">Present</option>
                                                                <option value="Absent">Absent</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-success" name="submit_mtech_attendance">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            // MCA department
                            $('#semester-mca').change(function() {
                                var semester = $(this).val();
                                if (semester) {
                                    $('#mca-students-table tbody tr').each(function() {
                                        var rowSemester = $(this).attr('class').split('-')[1]; 
                                        if (rowSemester == semester) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                } else {
                                    $('#mca-students-table tbody tr').show(); 
                                }
                            });
                    
                            // BCA department
                            $('#semester-bca').change(function() {
                                var semester = $(this).val();
                                if (semester) {
                                    $('#bca-students-table tbody tr').each(function() {
                                        var rowSemester = $(this).attr('class').split('-')[1];
                                        if (rowSemester == semester) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                } else {
                                    $('#bca-students-table tbody tr').show();
                                }
                            });

                            // Btech department
                            $('#semester-btech').change(function() {
                                var semester = $(this).val();
                                if (semester) {
                                    $('#bca-students-table tbody tr').each(function() {
                                        var rowSemester = $(this).attr('class').split('-')[1];
                                        if (rowSemester == semester) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                } else {
                                    $('#bca-students-table tbody tr').show();
                                }
                            });
                            // Mtech department
                            $('#semester-mtech').change(function() {
                                var semester = $(this).val();
                                if (semester) {
                                    $('#bca-students-table tbody tr').each(function() {
                                        var rowSemester = $(this).attr('class').split('-')[1];
                                        if (rowSemester == semester) {
                                            $(this).show();
                                        } else {
                                            $(this).hide();
                                        }
                                    });
                                } else {
                                    $('#bca-students-table tbody tr').show();
                                }
                            });
                    
                        });
                    </script>


                    <!-- All student -->
                    <div class="tab-pane fade" id="v-pills-all-user" role="tabpanel">
                        <h1>All student</h1>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Enrollment</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Father Name</th>
                                    <th scope="col">Mother Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Semester</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $selectAllStu = "SELECT * FROM student_add";
                                    $qryStu = mysqli_query($con,$selectAllStu);
                                    while($row=mysqli_fetch_assoc($qryStu)){
                                        $enroll = $row['enrollment'];
                                        $fullname = $row['fullname'];
                                        $fathername = $row['fathername'];
                                        $mothername = $row['mothername'];
                                        $department = $row['department'];
                                        $semester = $row['semester'];
                                        $pic = $row['profile_pic']
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $enroll;?></th>
                                    <td><?php echo $fullname;?></td>
                                    <td><?php echo $fathername;?></td>
                                    <td><?php echo $mothername;?></td>
                                    <td><?php echo $department;?></td>
                                    <td><?php echo $semester;?></td>
                                    <td>
                                        <!-- <button class="btn btn-info" type="button" data-toggle="modal" data-target="#myModal" value="">Profile</button> -->
                                        <button 
                                            class="btn btn-info view-profile-btn" 
                                            type="button" 
                                            data-toggle="modal" 
                                            data-target="#profileModal" 
                                            data-enrollment="<?php echo $enroll; ?>" 
                                            data-fullname="<?php echo $fullname; ?>"
                                            data-fathername="<?php echo $fathername; ?>"
                                            data-mothername="<?php echo $mothername; ?>"
                                            data-department="<?php echo $department; ?>"
                                            data-semester="<?php echo $semester; ?>"
                                            data-profile-pic="<?php echo 'img4/' . $pic; ?>"
                                        >
                                            Profile
                                        </button>

                                        <!-- <button class="btn btn-success" type="button" data-toggle="modal" data-target="#update" value="">Update</button> -->
                                        <button 
                                            class="btn btn-success update-student-btn" 
                                            type="button" 
                                            data-toggle="modal" 
                                            data-target="#updateModal" 
                                            data-enrollment="<?php echo $enroll; ?>" 
                                            data-fullname="<?php echo $fullname; ?>" 
                                            data-fathername="<?php echo $fathername; ?>" 
                                            data-mothername="<?php echo $mothername; ?>" 
                                            data-department="<?php echo $department; ?>" 
                                            data-semester="<?php echo $semester; ?>"
                                        >
                                            Update
                                        </button>

                                        <!-- <button class="btn btn-danger" value="">Delete</button> -->
                                        <button 
                                            class="btn btn-danger delete-student-btn" 
                                            data-enrollment="<?php echo $enroll; ?>"
                                        >
                                            Delete
                                        </button>


                                        <!-- profile -->
                                        <div class="modal" id="profileModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Student Profile</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="modal-profile-pic" src="" alt="Profile Picture" style="width:100%; height:auto;">
                                                        <p><b>Student Name:</b> <span id="modal-fullname"></span></p>
                                                        <p><b>Father Name:</b> <span id="modal-fathername"></span></p>
                                                        <p><b>Mother Name:</b> <span id="modal-mothername"></span></p>
                                                        <p><b>Department:</b> <span id="modal-department"></span></p>
                                                        <p><b>Semester:</b> <span id="modal-semester"></span></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- update -->
                                        <div class="modal" id="updateModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Student</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form id="updateForm">
                                                        <div class="modal-body">
                                                            <input type="hidden" id="update-enrollment" name="enrollment">
                                                            <div class="form-group">
                                                                <label for="update-fullname">Full Name</label>
                                                                <input type="text" class="form-control" id="update-fullname" name="fullname" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update-fathername">Father Name</label>
                                                                <input type="text" class="form-control" id="update-fathername" name="fathername" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update-mothername">Mother Name</label>
                                                                <input type="text" class="form-control" id="update-mothername" name="mothername" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update-department">Department</label>
                                                                <input type="text" class="form-control" id="update-department" name="department" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="update-semester">Semester</label>
                                                                <input type="text" class="form-control" id="update-semester" name="semester" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-info">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- script -->
                                        <script>
                                            // select
                                            $(document).on('click', '.view-profile-btn', function(event) {
                                                const fullname = $(this).data('fullname');
                                                const fathername = $(this).data('fathername');
                                                const mothername = $(this).data('mothername');
                                                const department = $(this).data('department');
                                                const semester = $(this).data('semester');
                                                const profilePic = $(this).data('profile-pic');
                                            
                                                $('#modal-profile-pic').attr('src', profilePic);
                                                $('#modal-fullname').text(fullname);
                                                $('#modal-fathername').text(fathername);
                                                $('#modal-mothername').text(mothername);
                                                $('#modal-department').text(department);
                                                $('#modal-semester').text(semester);
                                            
                                                $('#profileModal').modal('show');
                                            });

                                            // // update
                                            $(document).on('click', '.update-student-btn', function() {
                                                const enrollment = $(this).data('enrollment');
                                                const fullname = $(this).data('fullname');
                                                const fathername = $(this).data('fathername');
                                                const mothername = $(this).data('mothername');
                                                const department = $(this).data('department');
                                                const semester = $(this).data('semester');
                                            
                                                $('#update-enrollment').val(enrollment);
                                                $('#update-fullname').val(fullname);
                                                $('#update-fathername').val(fathername);
                                                $('#update-mothername').val(mothername);
                                                $('#update-department').val(department);
                                                $('#update-semester').val(semester);
                                            
                                                $('#updateModal').modal('show');
                                            });

                                            $('#updateForm').off('submit').on('submit', function(e) {
                                                e.preventDefault();
                                                const formData = new URLSearchParams(new FormData(this)).toString();
                                            
                                                fetch('asset/database/update_student.php', {
                                                    method: 'POST',
                                                    headers: {
                                                        'Content-Type': 'application/x-www-form-urlencoded',
                                                    },
                                                    body: formData,
                                                })
                                                    .then((response) => response.text())
                                                    .then((data) => {
                                                        if (data.trim() === 'Success') {
                                                            alert('Student updated successfully!');
                                                            location.reload(); // Reload page to reflect updates
                                                        } else {
                                                            alert('Error updating student: ' + data);
                                                        }
                                                    })
                                                    .catch((error) => {
                                                        alert('An error occurred: ' + error);
                                                    });
                                            });

                                            
                                            // delete
                                            $(document).on('click', '.delete-student-btn', function(e) {
                                                e.stopImmediatePropagation();  
                                                const enrollment = $(this).data('enrollment'); 
                                                const button = $(this);  
                                                if (confirm('Are you sure you want to delete this student?')) {
                                                    $.ajax({
                                                        url: 'asset/database/delete_student.php',  
                                                        method: 'POST',
                                                        data: { enrollment: enrollment },
                                                        success: function(response) {
                                                            if (response.trim() === 'Success') {
                                                                alert('Student deleted successfully!');
                                                                
                                                                button.closest('tr').remove(); 
                                                            } else {
                                                                alert('Error deleting student: ' + response);
                                                            }
                                                        },
                                                        error: function() {
                                                            alert('An error occurred while deleting the student.');
                                                        }
                                                    });
                                                }
                                            });
                                        </script>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="asset/js/index.js"></script>
    <script src="asset/js/user_add_reg.js"></script>
</body>
</html>
