<?php
function insert($conn, $data, $entity_type)
{
    try {
        $Insert = "insert into person values('','" . $data['First Name'] . "','" . $data['Last Name'] . "','" . $data['Date of Birth'] . "','" . $data['Address'] . "','" . $data['City'] . "','" . $data['Mobile'] . "','" . $data['Email'] . "','" . $data['Gender'] . "','" . $data['Qualification'] . "','" . $data['Photo'] . "','" . $data['Department'] . "','" . $data[($entity_type == 'faculty') ? "Joining Date" : "Admission Date"] . "','" . $data['Status'] . "','".$data['Designation']."')";

        return mysqli_query($conn, $Insert);

    } catch (\Throwable $th) {
        echo $th;
    }
}
?>