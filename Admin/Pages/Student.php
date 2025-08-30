<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - SSASIT Admin</title>
    <?php require 'config/Icon-Config.php'; ?>
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="Css/.css?v=<?php echo time(); ?>"> -->
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
    <?php require 'Components/Student-Form.php'; ?>
</body>

</html>