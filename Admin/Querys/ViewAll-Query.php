<?php
require 'db/connection.php';

function viewAll($conn, $view_type)
{
    try {
        if ($view_type === 'student') {
            $Select = "select * from person where Designation = '" . $view_type . "'";
            // $Select = "select * from person";
        }
        else {
            $Select = "select * from person where Designation != 'student'";
        }
        return mysqli_query($conn, $Select);
    } catch (\Throwable $th) {
        echo $th;
    }
}

?>