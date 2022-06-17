<?php
    session_start();

    unset($_SESSION['activeUser']);
    header('Location: ../index.php');
?>