<?php
$request_uri = $_SERVER['REQUEST_URI'];

$path = parse_url($request_uri, PHP_URL_PATH);

// Simple routing with a switch statement

switch ($path) {

    case '/Collage%20Project/Admin/Dashboard':
        require 'Pages/Dashboard.php';
        break;

    case "/Collage%20Project/Admin/Authentication":
        require 'Pages/Authentication.php';
        break;

    case '/Collage%20Project/Admin/Student':
        require 'Pages/Student.php';
        break;

    default:
        // Handle 404 Not Found errors for all other paths
        http_response_code(404);
        require 'Pages/404.html';
        break;
}
?>