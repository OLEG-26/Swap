<?php
    session_start();
    
    $admin_user = "admin";
    $admin_pass = "admin";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(isset($_POST["login"]))
    {
        if(strcmp($admin_user, $username) == 0 && strcmp($admin_pass, $password) == 0)
        {
            header('location: ../admin/mainpage/adminpage.html');
        }
        else
        {
            $_SESSION["admin_error"] = "Invalid admin credentials.";
            header('location: ../admin/login_admin.php');
        }
    }
?>