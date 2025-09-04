<?php
require 'Services/Verify-User.php';
require 'Querys/ViewAll-Query.php';
// echo 'this view page';

$view_type = isset($_GET['type']) ? $_GET['type'] : '';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All <?php echo $view_type; ?> - SSASIT Admin</title>
    <?php require 'config/Icon-Config.php'; ?>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Css/View.css?v=<?php echo time(); ?>">
</head>
<style>
    body {
        font-family: var(--primary-font);
        background: var(--bg-gradient);
        min-height: 100vh;
        /* padding: 1.25rem; */
    }
</style>
<body>
    <?php require 'Components/Header.php'; ?>
</body>
</html>