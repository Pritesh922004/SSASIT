<?php
$Status = "Disconnected";
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "ssasit");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
$Status = "Connected";
// $Database_Create = 'create database demo';
// $Table_Create = `CREATE TABLE Person(
//     ID INT AUTO_INCREMENT PRIMARY KEY, 
//     First Name VARCHAR(100), 
//     Last Name VARCHAR(100), 
//     DOB DATE, 
//     Address VARCHAR(200), 
//     City VARCHAR(100), 
//     Mobile Number VARCHAR(10), 
//     Email VARCHAR(100), 
//     Gender ENUM("Male", "Female", "Other"), 
//     Qualification VARCHAR(100), 
//     Photo VARCHAR(100), 
//     Dept_ID INT, 
//     Admission_Date DATE, 
//     Status ENUM("Active", "Inactive", "Terminated", "Detained", "Graduated", "Under Graduation", "Post Graduation", "Resigned"), 
//     Designation ENUM("Student", "Professor", "Assistant Prof.", "Lab Assistant", "HOD", "Dean", "Principal")
// )`;
// mysqli_query($conn, $Database_Create);
// define("DB_NAME", "demo");
// mysqli_select_db($conn, DB_NAME);
// mysqli_query($conn, $Table_Create);
// echo "Connected successfully";

?>