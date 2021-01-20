<?php
    //destroy the current session and then redirect the user to indexWoutAcc
    session_destroy();
    header('location: ../indexWoutAcc.php');
?>