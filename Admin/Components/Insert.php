<?php
$result;
// require 'db/connection.php';
require 'Querys/Insert-Query.php';

$entity_type = isset($_GET['type']) ? $_GET['type'] : '';

if($entity_type === 'student' || $entity_type === 'faculty'){
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
    "Experience" => isset($_POST['experience']) ? $_POST['experience'] : 0,
];
$result = insert($conn, $data, $entity_type);
}
else {
    $data = [
        "Department Name" => $_POST['departmentName'],
        "HOD Name" => $_POST['hodName'],
        "Established Year" => $_POST['establishedYear'],
        "Department Status" => $_POST['departmentStatus'],
        "Department Description" => $_POST['departmentDescription'],
    ];
    $result = insertDepartment($conn, $data);
}





if ($result) {
    header("Location: entities?type=$entity_type&status=success");
} else {
    header("Location: entities?type=$entity_type&status=field");
}

mysqli_close($conn);
?>