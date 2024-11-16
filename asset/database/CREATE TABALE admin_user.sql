CREATE TABALE admin_user
(
    fullname VARCHAR(255) NOT NULL,
    profilepic BLOB NOT NULL,
    email VARCHAR(255) NOT NULL PRIMARY KEY,
    mobile VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO admin_user(fullname,profilepic,email,mobile,department,gender,password) VALUE ('$name','$profilepic','$email','$mobile','$department','$gender','$address','$password1');


CREATE TABLE student_add(
    fullname VARCHAR(255) NOT NULL,
    profile_pic BLOB NOT NUll,
    fathername VARCHAR(255) NOT NULL,
    mothername VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    semester VARCHAR(255) NOT NULL,
    enrollment VARCHAR(255) NOT NULL PRIMARY KEY,
    gender VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);


CREATE TABLE assingment(
    assingmenttop VARCHAR(255) NULL,
    assingmentfile BLOB NOT NULL,
    department VARCHAR(255) NOT NULL,
    semester VARCHAR(255) NOT NULL
);