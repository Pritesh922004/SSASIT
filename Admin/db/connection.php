<?php
$Status = "Disconnected";
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "ssasit");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    // die("Connection failed" . mysqli_connect_error());
    exit();
}
$Status = "Connected";
// echo $Status;

// require '../Querys/Insert Data.php';

// $entity_type = 'student';

// $data = [
//     "First Name" => "pritesh",
//     "Last Name" => "godavariya",
//     "Date of Birth" => "01-01-2005",
//     "Address" => '6334 nilkanth',
//     "City" => 'ahmedabad',
//     "Mobile" => '9876543210',
//     "Email" => 'pritesh@gmail.com',
//     "Gender" => 'male',
//     "Qualification" => '12th',
//     "Photo" => 'SSASIT.png',
//     "Department" => '1',
//     ($entity_type == 'faculty') ? "Joining Date" : "Admission Date" => '2020-01-01',
//     "Status" => 'active',
//     "Designation" => 'Student',
// ];
// echo insert($conn, $data, $entity_type);
?>