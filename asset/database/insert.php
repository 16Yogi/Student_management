<?php
    // include connection
    include("connection.php");
    // echo "<pre>".print_r($_POST,1)."</pre>";
    // exit;

// Insert admin data
if (isset($_POST['submit'])) {    
    $name = $_POST['name'];
    
    $profilepic = $_FILES['pic']['name'];
    $profilepicTMP = $_FILES['pic']['tmp_name'];
    $folder = "img4/";
    move_uploaded_file($profilepicTMP, $folder . $profilepic);
    // echo $profilepic;

    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $department = $_POST['department'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    // echo $password1;
    // Hash the password (recommended)
    // $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
    $select = "SELECT * FROM admin_user WHERE email='$email'";
    $selectqry = mysqli_query($con,$select);
    $row=mysqli_fetch_assoc($selectqry);
    // echo $selectqry;
    // exit;
    $mail = $row['email'];
    // echo $mail;
    // // exit;

    // echo "click";
    if($mail == $email){
        // echo "ok1";
        echo "<script>alert('Admin user already exist')</script>";
        echo "<script>location.href='../../Home.php'</script>";
    }else{
        $admin_insert = "INSERT INTO admin_user (fullname, profilepic, email, mobile, department, gender, address, password) VALUES ('$name', '$profilepic', '$email', '$mobile', '$department', '$gender', '$address', '$password1')";
    
        // $admin_insert = "INSERT INTO admin_user (fullname, profilepic, email, mobile, department, gender, password) VALUES ('$name', '$profilepic', '$email', '$mobile', '$department', '$gender', '$password1')";
        $result_admin = mysqli_query($con, $admin_insert);
        if ($result_admin) {
            // echo "ok2";
            echo "<script>alert('Admin account created successfully')</script>";
            echo "<script>location.href='../../Home.php'</script>";
        } else {
            // echo "ok3";
            echo "<script>alert('Admin account creation failed: " . mysqli_error($con) . "')</script>";
            echo "<script>location.href='../../Home.php'</script>";
        }
    }
    
}

// ------------------------------------

// if($_SERVER["REQUEST_METHOD"] == "POST"){
    
//     $json = file_get_contents('php://input');
//     $data = json_decode($json,true);
    
//     $name = $data['name'];
    
//     $profilepic = $data['pic']['name'];
//     $profilepicTMP = $data['pic']['tmp_name'];
//     $folder = "img4/";
//     move_uploaded_file($profilepicTMP, $folder . $profilepic);

//     $email = $data['email'];
//     $mobile = $_POST['mobile'];
//     $department = $data['department'];
//     $gender = $data['gender'];
//     $address = $data['address'];
//     $password1 = $data['password1'];
//     $password2 = $data['password2'];

//     $insert = "INSERT INTO admin_user(fullname,profilepic,email,mobile,department,gender,address,password) VALUES('$name','$profilepic','$email','$mobile','$department','$gender','$password1')";
//     $insertResult = mysqli_query($con,$insert);
//     if($insert){
//         echo "<script>alert('done')</script>";
//     }else{
//         echo "<script>alert('Na')</script>";
//     }
    
// }

// -------------------------------------

// chat gpt
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['username'];
//     $email = $_POST['useremail'];
//     $mobile = $_POST['usermobile'];
//     $department = $_POST['userdepartment'];
//     $gender = $_POST['usergender'];
//     $address = $_POST['useraddress'];
//     $password1 = $_POST['userpassword1'];

//     // Handle file upload
//     $profilepic = $_FILES['userpic']['name'];
//     $profilepicTMP = $_FILES['userpic']['tmp_name'];
//     $folder = "img4/";

//     if (move_uploaded_file($profilepicTMP, $folder . $profilepic)) {
//         $profilepicPath = $folder . $profilepic;
//     } else {
//         echo json_encode(['message' => 'File upload failed']);
//         exit;
//     }

//     // Database connection
//     $con = new mysqli("hostname", "username", "password", "database");

//     // SQL query
//     $insert = "INSERT INTO admin_user(fullname, profilepic, email, mobile, department, gender, address, password) 
//                VALUES ('$name', '$profilepicPath', '$email', '$mobile', '$department', '$gender', '$address', '$password1')";
    
//     $insertResult = mysqli_query($con, $insert);

//     if ($insertResult) {
//         echo json_encode(['message' => 'Admin created']);
//     } else {
//         echo json_encode(['message' => 'Database insertion failed']);
//     }
//     mysqli_close($con);
// }


// ------------------------------------------------


// add student

if (isset($_POST['submitstu'])) {
    $stuFullName = $_POST['fullname'];

    $stuPic = $_FILES['pic']['name'];
    $profilepicTMP = $_FILES['pic']['tmp_name'];
    $folder = "img4/";
    move_uploaded_file($profilepicTMP, $folder . $stuPic);

    $stuFatherName = $_POST['father'];
    $stuMotherName = $_POST['mother'];
    $stuDepart = $_POST['department'];
    $stuSem = $_POST['semester'];
    $stuEnroll = $_POST['enrollment'];
    $stuGender = $_POST['gender'];
    $stuEmail = $_POST['email'];
    $stuMobile = $_POST['mobile'];
    $stuAdd = $_POST['address'];
    $stuPassword1 = $_POST['password1'];
    // $stuPasswordHashed = password_hash($stuPassword1, PASSWORD_DEFAULT);
    $selectStu = "SELECT * FROM student_add WHERE '$stuEnroll'";
    $selectResult = mysqli_query($con,$selectStu);
    $row = mysqli_fetch_assoc($selectResult);
    $dbenroll = $row['enrollment'];
    if($dbenroll == $stuEnroll){
        echo "<script>alert('Student Already exist')</script>";
        echo "<script>location.href='index.php'</script>";    
    }else{
        $stuInsert = "INSERT INTO student_add (fullname, profile_pic, fathername, mothername, department, semester, enrollment, gender, email, mobile, address, password) VALUES ('$stuFullName', '$stuPic', '$stuFatherName', '$stuMotherName', '$stuDepart', '$stuSem', '$stuEnroll', '$stuGender', '$stuEmail', '$stuMobile', '$stuAdd', '$stuPassword1')";

        $result = mysqli_query($con, $stuInsert);
    
        if ($result) {
            echo "<script>alert('Student Added')</script>";
            echo "<script>location.href='index.php'</script>";    

        } else {
            echo "<script>alert('Student not added: " . mysqli_error($con) . "')</script>";
            echo "<script>location.href='index.php'</script>";    

        }
    }
    
    
}


// add assignment
if(isset($_POST['sendAssig'])){
    $assigTopic = $_POST['AssignmenTop'];
    // echo $assigTopic;
    // exit;
    $assigFile = $_FILES['assignmentFile']['name'];
    $assigFileTMP = $_FILES['assignmentFile']['tmp_name'];
    $folder = "assig/";
    move_uploaded_file($assigFileTMP, $folder . $assigFile);

    $depart = $_POST['department'];
    $sem = $_POST['sem'];
    
    $insertAssg = "INSERT INTO assingment(assingmenttop, assingmentfile, department, semester) VALUES('$assigTopic','$assigFile','$depart','$sem')";
    $assQry = mysqli_query($con,$insertAssg);
    // exit;
    if($assQry){
        echo "<script>alert('Assignment Uploaded')</script>";
    }else{
        echo "<script>alert('Assignment not uploaded')</script>";
    }
}



// bca

if (isset($_POST['bcaStuAtt'])) {
    $stuAtt = "SELECT * FROM student_add WHERE department='BCA'";
    $stuAttqry = mysqli_query($con, $stuAtt);

    while ($row = mysqli_fetch_assoc($stuAttqry)) {
        $enrollment = $row['enrollment'];

        // Retrieve subject and attendance for each student
        $subject = isset($_POST['subject_' . $enrollment]) ? $_POST['subject_' . $enrollment] : null;
        $attendance = isset($_POST['attendance_' . $enrollment]) ? $_POST['attendance_' . $enrollment] : null;

        // Validate that both fields are selected
        if ($subject && $attendance) {
            $date = date("Y-m-d"); // Current date

            // Check if the attendance record already exists
            $checkAttendance = "SELECT * FROM attendance WHERE enrollment=? AND date=? AND subject=?";
            $stmt = mysqli_prepare($con, $checkAttendance);
            mysqli_stmt_bind_param($stmt, 'sss', $enrollment, $date, $subject);
            mysqli_stmt_execute($stmt);
            $checkResult = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($checkResult) == 0) {
                // Insert new attendance record
                $insertAttendance = "INSERT INTO attendance (enrollment, date, subject, attendance) VALUES (?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($con, $insertAttendance);
                mysqli_stmt_bind_param($stmtInsert, 'ssss', $enrollment, $date, $subject, $attendance);
                $result = mysqli_stmt_execute($stmtInsert);

                if ($result) {
                    echo "<script>alert('Attendance recorded for $enrollment in $subject on $date.');</script>";
                } else {
                    echo "<script>alert('Error recording attendance for $enrollment.');</script>";
                }
            } else {
                echo "<script>alert('Attendance for $enrollment in $subject on $date already exists.');</script>";
            }
        }
    }
}



// btech
if (isset($_POST['BtechStuAtt'])) {
    // Loop through each student enrollment to capture attendance data
    $stuAtt = "SELECT * FROM student_add WHERE department='BTech'";
    $stuAttqry = mysqli_query($con, $stuAtt);
    while ($row = mysqli_fetch_assoc($stuAttqry)) {
        $enrollment = $row['enrollment'];

        // Get the selected subject and attendance for this student
        $subject = isset($_POST['subject_' . $enrollment]) ? $_POST['subject_' . $enrollment] : null;
        $attendance = isset($_POST['attendance_' . $enrollment]) ? $_POST['attendance_' . $enrollment] : null;

        // Only insert if both subject and attendance are selected
        if ($subject && $attendance) {
            $date = date("Y-m-d");  // Current date in YYYY-MM-DD format

            // Check if the attendance record already exists for this enrollment, date, and subject
            $checkAttendance = "SELECT * FROM attendance WHERE enrollment=? AND date=? AND subject=?";
            $stmt = mysqli_prepare($con, $checkAttendance);
            mysqli_stmt_bind_param($stmt, 'sss', $enrollment, $date, $subject);
            mysqli_stmt_execute($stmt);
            $checkResult = mysqli_stmt_get_result($stmt);
            // echo $checkResult;
            // If no existing record for the subject, insert new attendance record
            if (mysqli_num_rows($checkResult) == 0) {
                // Prepare the insert query
                $insertAttendance = "INSERT INTO attendance (enrollment, date, subject, attendance) 
                                     VALUES (?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($con, $insertAttendance);
                mysqli_stmt_bind_param($stmtInsert, 'ssss', $enrollment, $date, $subject, $attendance);
                $result = mysqli_stmt_execute($stmtInsert);

                // Handle successful insertion
                if ($result) {
                    echo "<script>alert('Attendance submitted successfully for $enrollment in $subject on $date.')</script>";
                } else {
                    echo "<script>alert('Error recording attendance for student: $enrollment')</script>";
                }
            } else {
                // Attendance already exists for this enrollment, subject, and date
                echo "<script>alert('Attendance for $enrollment on $date for subject $subject has already been recorded.')</script>";
            }
        }
    }
}

// mtech
if (isset($_POST['MtechStuAtt'])) {
    // Loop through each student enrollment to capture attendance data
    $stuAtt = "SELECT * FROM student_add WHERE department='Tech'";
    $stuAttqry = mysqli_query($con, $stuAtt);
    while ($row = mysqli_fetch_assoc($stuAttqry)) {
        $enrollment = $row['enrollment'];

        // Get the selected subject and attendance for this student
        $subject = isset($_POST['subject_' . $enrollment]) ? $_POST['subject_' . $enrollment] : null;
        $attendance = isset($_POST['attendance_' . $enrollment]) ? $_POST['attendance_' . $enrollment] : null;

        // Only insert if both subject and attendance are selected
        if ($subject && $attendance) {
            $date = date("Y-m-d");  // Current date in YYYY-MM-DD format

            // Check if the attendance record already exists for this enrollment, date, and subject
            $checkAttendance = "SELECT * FROM attendance WHERE enrollment=? AND date=? AND subject=?";
            $stmt = mysqli_prepare($con, $checkAttendance);
            mysqli_stmt_bind_param($stmt, 'sss', $enrollment, $date, $subject);
            mysqli_stmt_execute($stmt);
            $checkResult = mysqli_stmt_get_result($stmt);
            // echo $checkResult;
            // If no existing record for the subject, insert new attendance record
            if (mysqli_num_rows($checkResult) == 0) {
                // Prepare the insert query
                $insertAttendance = "INSERT INTO attendance (enrollment, date, subject, attendance) 
                                     VALUES (?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($con, $insertAttendance);
                mysqli_stmt_bind_param($stmtInsert, 'ssss', $enrollment, $date, $subject, $attendance);
                $result = mysqli_stmt_execute($stmtInsert);

                // Handle successful insertion
                if ($result) {
                    echo "<script>alert('Attendance submitted successfully for $enrollment in $subject on $date.')</script>";
                } else {
                    echo "<script>alert('Error recording attendance for student: $enrollment')</script>";
                }
            } else {
                // Attendance already exists for this enrollment, subject, and date
                echo "<script>alert('Attendance for $enrollment on $date for subject $subject has already been recorded.')</script>";
            }
        }
    }
}




?>


