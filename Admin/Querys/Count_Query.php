<?php
require 'db/connection.php';

function Student_Count($conn, $count_type)
{
    try {
        if ($count_type) {
            $Select = "select count(ID),First_Name from person where Designation = 'student' and Status = '" . $count_type . "'";
        }
        $Select = "select count(ID),First_Name from person where Designation = 'student'";
        return mysqli_query($conn, $Select);
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
}
?>