<?php
require 'db/connection.php';
require 'Querys/Insert-Query.php';

$entity_type = isset($_GET['type']) ? $_GET['type'] : 'student';

$data = [
    "First Name" => $_POST['firstName'],
    "Last Name" => $_POST['lastName'],
    "Date of Birth" => $_POST['dob'],
    "Address" => $_POST['address'],
    "City" => $_POST['city'],
    "Mobile" => $_POST['mobile'],
    "Email" => $_POST['email'],
    "Gender" => $_POST['gender'],
    "Qualification" => $_POST['qualification'],
    "Photo" => 'SSASIT.png',
    "Department" => $_POST['department'],
    "Status" => $_POST['status'],
    ($entity_type == 'faculty') ? "Joining Date" : "Admission Date" => $_POST['admissionDate'],
    "Designation" => ($entity_type == 'student') ? "Student" : $_POST['designation'],

];

$result = insert($conn, $data, $entity_type);
if ($result) {
    header("Location: entities?type=$entity_type&status=success");
} else {
    header("Location: entities?type=$entity_type&status=field");
}

mysqli_close($conn);
?>