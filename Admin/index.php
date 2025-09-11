<?php
$request_uri = $_SERVER['REQUEST_URI'];

$path = parse_url($request_uri, PHP_URL_PATH);

// Simple routing with a switch statement

switch ($path) {

    case '/SSASIT/Admin/Dashboard':
        require 'Pages/Dashboard.php';
        break;

    case "/SSASIT/Admin/Authentication":
        require 'Pages/Authentication.php';
        break;

    case '/SSASIT/Admin/entities':
        require 'Pages/Entities.php';
        break;
    case '/SSASIT/Admin/Insert':
        require 'Services/Insert.php';
        break;
    case '/SSASIT/Admin/View':
        require 'Pages/View.php';
        break;
    case '/SSASIT/Admin/Delete':
        require 'Services/Delete.php';
        break;
    default:
        // Handle 404 Not Found errors for all other paths
        http_response_code(404);
        require 'Pages/404.html';
        break;
}
?>