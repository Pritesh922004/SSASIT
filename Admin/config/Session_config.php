<?php
function session_timeout() {
    $timeout = 3600;
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
        session_unset();
        session_destroy();
        header('Location: Authentication.php');
        exit();
    }
}

?>