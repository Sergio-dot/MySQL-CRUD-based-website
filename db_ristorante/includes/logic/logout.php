<?php
    session_start();
    session_destroy();
    unset($_SESSION['session_user']);
    header("location: ../../index.html");
?>