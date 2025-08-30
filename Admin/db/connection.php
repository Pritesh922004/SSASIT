<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
echo "connected";

?>