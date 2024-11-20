<?php
    include("asset/database/insert.php");
    include("asset/database/insert.php");
    // sesstion start
    session_start();
    $stu_userid = $_SESSION['stu_user_name'];
    
    if($stu_userid == true){
        // echo $stu_userid;
        $selectStu = "SELECT * FROM student_add WHERE email = '$stu_userid'";
        $resultStu = mysqli_query($con,$selectStu);
        $row = mysqli_fetch_assoc($resultStu);
        
        $stuname = $row['fullname'];
        $stupic = $row['profile_pic'];
        $stufather = $row['fathername'];
        $stumother = $row['mothername'];
        $studepart = $row['department'];
        $sem = $row['semester'];
        $enroll = $row['enrollment'];
        $gender = $row['gender'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $address = $row['address'];
        
    }else{
        echo "<script>alert('user not logged-in')</script>";
        echo "<script>location.href='Home.php'</script>";
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index | Student</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
                        <a class="nav-link" data-toggle="dropdown" href="#"><?php echo $stuname; ?> <i class="fa-solid fa-angle-down"></i></a>
                        <div class="dropdown-menu">
                            <a href="asset/database/stu_logout.php" class="dropdown-item">Logout</a>
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
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-meeting" type="button"><i class="fa-solid fa-handshake pr-3"></i>Meeting</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-assingment" type="button"><i class="fa-solid fa-file pr-3"></i>Assignment</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-attendance" type="button"><i class="fa-solid fa-clipboard-user pr-3"></i>Attendance</button>
                    <button class="nav-link text-left" id="v-pills-users-tab" data-toggle="pill" data-target="#v-pills-report" type="button"><i class="fa-solid fa-bug pr-3"></i>Report</button>
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
                                    <img src="asset/database/img4/<?php echo $stupic ; ?>" alt="profilepic" class="img-fluid">
                                </div>
                                <div class="col-8 row">
                                    <div class="col-6">
                                        <p>
                                            <b>Name:</b>
                                            <span><?php echo $stuname; ?></span>
                                        </p>
                                        <p>
                                            <b>Father Name:</b>
                                            <span><?php echo $stufather;?></span>
                                        </p>
                                        <p>
                                            <b>Department:</b>
                                            <span><?php echo $studepart;?></span>
                                        </p>
                                        <p>
                                            <b>Email:</b>
                                            <span><?php echo $email; ?></span>
                                        </p>
                                        <p>
                                            <b>Gender:</b>
                                            <span><?php echo $gender ; ?></span>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p>
                                            <b>Enrollment:</b>
                                            <span><?php echo $enroll;?></span>
                                        </p>
                                        <p>
                                            <b>Mother Name:</b>
                                            <span><?php echo $stumother;?></span>
                                        </p>
                                        <p>
                                            <b>Semester:</b>
                                            <span><?php echo $sem;?></span>
                                        </p>
                                        <p>
                                            <b>Mobile:</b>
                                            <span><?php echo $mobile; ?></span>
                                        </p>
                                        <p>
                                            <b>Address:</b>
                                            <span><?php echo $address; ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <!-- end profile -->

                   

                    <!-- start meeting -->
                    <div class="tab-pane fade" id="v-pills-meeting" role="tabpanel">
                        <h1>Meeting</h1>
                        <hr>
                        <div class="col">
                            <a href="">
                                <button class="btn btn-info">Join the meeting</button>
                            </a>
                        </div>
                    </div>
                    <!-- end meeting -->

                    <!-- assingment -->
                    <div class="tab-pane fade" id="v-pills-assingment" role="tabpanel">
                        <div class="row py-2">
                            <div class="col-10">
                                <h3>Assingment</h3>
                            </div>
                            <div class="col-2">
                                <form method="GET" action="">
                                    <select name="filter_subject" id="filter_subject" class="form-control" onchange="this.form.submit()">
                                        <option value="">Select Subject..</option>
                                        <option value="C++" <?php if(isset($_GET['filter_subject']) && $_GET['filter_subject'] == 'C++') echo 'selected'; ?>>C++</option>
                                        <option value="Java" <?php if(isset($_GET['filter_subject']) && $_GET['filter_subject'] == 'Java') echo 'selected'; ?>>Java</option>
                                        <option value="Python" <?php if(isset($_GET['filter_subject']) && $_GET['filter_subject'] == 'Python') echo 'selected'; ?>>Python</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-secondary">
                                    <th scope="col">Assignment Topics</th>
                                    <th scope="col">Assignment File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($stu_userid) && $stu_userid) {
                                    $filter_subject = isset($_GET['filter_subject']) ? $_GET['filter_subject'] : '';
                                    $selectAssignments = "
                                        SELECT assingmenttop, assingmentfile
                                        FROM assingment
                                        WHERE department = '$studepart' AND semester = '$sem'";
                    
                                    if (!empty($filter_subject)) {
                                        $selectAssignments .= " AND subject = '$filter_subject'";
                                    }
                    
                                    $assignmentQuery = mysqli_query($con, $selectAssignments);
                    
                                    if (mysqli_num_rows($assignmentQuery) > 0) {
                                        while ($row = mysqli_fetch_assoc($assignmentQuery)) {
                                            echo "<tr>
                                                    <td>{$row['assingmenttop']}</td>
                                                    <td><a href='path_to_files/{$row['assingmentfile']}' target='_blank'>Download</a></td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='2' class='text-center'>No assignments found for your department and semester</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='2' class='text-center'>Please log in to view assignments.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end assingment -->

                    <!-- start Attendance -->
                    <div class="tab-pane fade" id="v-pills-attendance" role="tabpanel">
                        <div class="row py-2">
                            <div class="col-10">
                                <h3>Attendance</h3>
                            </div>
                            <div class="col-2">
                                <form method="GET" action="">
                                    <select name="filter_subject" id="filter_subject" class="form-control" onchange="this.form.submit()">
                                        <option value="">Select Subject..</option>
                                        <option value="C++" <?php if(isset($_GET['filter_subject']) && $_GET['filter_subject'] == 'C++') echo 'selected'; ?>>C++</option>
                                        <option value="Java" <?php if(isset($_GET['filter_subject']) && $_GET['filter_subject'] == 'Java') echo 'selected'; ?>>Java</option>
                                        <option value="Python" <?php if(isset($_GET['filter_subject']) && $_GET['filter_subject'] == 'Python') echo 'selected'; ?>>Python</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-secondary">
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Enrollment</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $filter_subject = isset($_GET['filter_subject']) ? $_GET['filter_subject'] : '';
                    
                                $selectAttend = "
                                    SELECT 
                                        sa.fullname AS student_name, 
                                        a.enrollment, 
                                        a.date, 
                                        a.subject 
                                    FROM 
                                        attendance a 
                                    INNER JOIN 
                                        student_add sa 
                                    ON 
                                        a.enrollment = sa.enrollment 
                                    WHERE 
                                        a.enrollment='$enroll'";
                    
                                if (!empty($filter_subject)) {
                                    $selectAttend .= " AND a.subject = '$filter_subject'";
                                }
                                
                                $Attendqry = mysqli_query($con, $selectAttend);
                    
                                if (mysqli_num_rows($Attendqry) > 0) {
                                    while ($row = mysqli_fetch_assoc($Attendqry)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['student_name']; ?></td>
                                    <td><?php echo $row['enrollment']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end attendance -->
                    
                    <!-- report releted to issue  -->
                    <div class="tab-pane fade" id="v-pills-report" role="tabpanel">
                        <h1>Report</h1>
                        <hr>
                        <div class="col">
                            <form id="reportForm">
                                <div class="form-group">
                                    <label for="title">Report Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Title...">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Example textarea</label>
                                    <textarea class="form-control" id="comment" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Submit your report</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script>
                       document.getElementById("reportForm").addEventListener("submit", function(event) {
                       event.preventDefault(); 
                   
                       let title = document.getElementById("title").value;
                       let comment = document.getElementById("comment").value;
                   
                       let enrollment = '<?php echo $enroll; ?>';
                            if (title && comment) {
                                fetch('asset/database/report_submit.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded', 
                                    },
                                    body: new URLSearchParams({
                                        enrollment: enrollment,
                                        report_title: title,
                                        report_comment: comment
                                    })
                                })
                                .then(response => response.json()) 
                                .then(data => {
                                    if (data.message === "Report submitted") {
                                        alert("Report successfully submitted!");
                                    } else {
                                        alert("Failed to submit report. Please try again.");
                                    }
                                })
                                .catch(error => {
                                    console.error("Error submitting report:", error);
                                    alert("An error occurred. Please try again later.");
                                });
                            } else {
                                alert("Please fill out both the title and comment fields.");
                            }
                        });

                    </script>

                    <!-- end report -->
                </div>
            </div>
        </div>
    </div>
    <script src="asset/js/index.js"></script>
    <script src="asset/js/user_add_reg.js"></script>
</body>
</html>
