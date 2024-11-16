<?php
include 'connection.php';


// MCA
if (isset($_POST['mcaStuAtt'])) {
    // Loop through each student enrollment to capture attendance data
    $stuAtt = "SELECT * FROM student_add WHERE department='MCA'";
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


// BCA
if (isset($_POST['submit_bca_attendance'])) {
    $stuAtt = "SELECT * FROM student_add WHERE department='BCA'";
    $stuAttqry = mysqli_query($con, $stuAtt);
    while ($row = mysqli_fetch_assoc($stuAttqry)) {
        $enrollment = $row['enrollment'];

        $subject = isset($_POST['subject_' . $enrollment]) ? $_POST['subject_' . $enrollment] : null;
        $attendance = isset($_POST['attendance_' . $enrollment]) ? $_POST['attendance_' . $enrollment] : null;

        if ($subject && $attendance) {
            $date = date("Y-m-d");  

            $checkAttendance = "SELECT * FROM attendance WHERE enrollment=? AND date=? AND subject=?";
            $stmt = mysqli_prepare($con, $checkAttendance);
            mysqli_stmt_bind_param($stmt, 'sss', $enrollment, $date, $subject);
            mysqli_stmt_execute($stmt);
            $checkResult = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($checkResult) == 0) {
                $insertAttendance = "INSERT INTO attendance (enrollment, date, subject, attendance) 
                                     VALUES (?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($con, $insertAttendance);
                mysqli_stmt_bind_param($stmtInsert, 'ssss', $enrollment, $date, $subject, $attendance);
                $result = mysqli_stmt_execute($stmtInsert);

                if ($result) {
                    echo "<script>alert('Attendance submitted successfully for $enrollment in $subject on $date.')</script>";
                } else {
                    echo "<script>alert('Error recording attendance for student: $enrollment')</script>";
                }
            } else {
                echo "<script>alert('Attendance for $enrollment on $date for subject $subject has already been recorded.')</script>";
            }
        }
    }
}


// not working


// btech
if (isset($_POST['submit_btech_attendance'])) {
    $stuAtt = "SELECT * FROM student_add WHERE department='BTech'";
    $stuAttqry = mysqli_query($con, $stuAtt);
    while ($row = mysqli_fetch_assoc($stuAttqry)) {
        $enrollment = $row['enrollment'];

        $subject = isset($_POST['subject_' . $enrollment]) ? $_POST['subject_' . $enrollment] : null;
        $attendance = isset($_POST['attendance_' . $enrollment]) ? $_POST['attendance_' . $enrollment] : null;

        if ($subject && $attendance) {
            $date = date("Y-m-d");  

            $checkAttendance = "SELECT * FROM attendance WHERE enrollment=? AND date=? AND subject=?";
            $stmt = mysqli_prepare($con, $checkAttendance);
            mysqli_stmt_bind_param($stmt, 'sss', $enrollment, $date, $subject);
            mysqli_stmt_execute($stmt);
            $checkResult = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($checkResult) == 0) {
                $insertAttendance = "INSERT INTO attendance (enrollment, date, subject, attendance) 
                                     VALUES (?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($con, $insertAttendance);
                mysqli_stmt_bind_param($stmtInsert, 'ssss', $enrollment, $date, $subject, $attendance);
                $result = mysqli_stmt_execute($stmtInsert);

                if ($result) {
                    echo "<script>alert('Attendance submitted successfully for $enrollment in $subject on $date.')</script>";
                } else {
                    echo "<script>alert('Error recording attendance for student: $enrollment')</script>";
                }
            } else {
                echo "<script>alert('Attendance for $enrollment on $date for subject $subject has already been recorded.')</script>";
            }
        }
    }
}

// mtech
if (isset($_POST['submit_mtech_attendance'])) {
    $stuAtt = "SELECT * FROM student_add WHERE department='MTech'";
    $stuAttqry = mysqli_query($con, $stuAtt);
    while ($row = mysqli_fetch_assoc($stuAttqry)) {
        $enrollment = $row['enrollment'];

        $subject = isset($_POST['subject_' . $enrollment]) ? $_POST['subject_' . $enrollment] : null;
        $attendance = isset($_POST['attendance_' . $enrollment]) ? $_POST['attendance_' . $enrollment] : null;

        if ($subject && $attendance) {
            $date = date("Y-m-d");  

            $checkAttendance = "SELECT * FROM attendance WHERE enrollment=? AND date=? AND subject=?";
            $stmt = mysqli_prepare($con, $checkAttendance);
            mysqli_stmt_bind_param($stmt, 'sss', $enrollment, $date, $subject);
            mysqli_stmt_execute($stmt);
            $checkResult = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($checkResult) == 0) {
                $insertAttendance = "INSERT INTO attendance (enrollment, date, subject, attendance) 
                                     VALUES (?, ?, ?, ?)";
                $stmtInsert = mysqli_prepare($con, $insertAttendance);
                mysqli_stmt_bind_param($stmtInsert, 'ssss', $enrollment, $date, $subject, $attendance);
                $result = mysqli_stmt_execute($stmtInsert);

                if ($result) {
                    echo "<script>alert('Attendance submitted successfully for $enrollment in $subject on $date.')</script>";
                } else {
                    echo "<script>alert('Error recording attendance for student: $enrollment')</script>";
                }
            } else {
                echo "<script>alert('Attendance for $enrollment on $date for subject $subject has already been recorded.')</script>";
            }
        }
    }
}

?>
