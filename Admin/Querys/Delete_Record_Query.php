<?php
// require 'db/connection.php';

function deleteRecord($conn,$id, $table)
{
    // global $conn;
    try {
        if($table === "department"){
            $Delete = "delete from $table where ID = '" . $id . "'";
            return mysqli_query($conn, $Delete);
        }
        $Delete = "delete from person where ID = '".$id."'";
    } catch (\Throwable $th) {
        echo $th;
    }
}

?>