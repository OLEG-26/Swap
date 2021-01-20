<?php
    //start a session to use session variables
    session_start();

    //set userID in in a session variable
    $userID = $_SESSION['userID'];

    //database information
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'swap_information';

    //create the connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    //check what text fields are not empty and then update in the database all of the textfield(s) that is/are not empty
    if($_POST["firstname"] != '')
    {
        $firstname = $_POST["firstname"];
        $conn->query("UPDATE user_information SET First_name = '$firstname' WHERE User_info_id = $userID");
    }
    if($_POST["lastname"] != '')
    {
        $lastname = $_POST["lastname"];
        $conn->query("UPDATE user_information SET Last_name = '$lastname' WHERE User_info_id = $userID");
    }
    if($_POST["contact"] != '')
    {
        $contact = $_POST["contact"];
        $conn->query("UPDATE user_information SET Contact = $contact WHERE User_info_id = $userID");
    }
    if($_POST["facebook"] != '')
    {
        $social = $_POST["facebook"];
        $conn->query("UPDATE user_information SET social_account = '$social' WHERE User_info_id = $userID");
    }

    //after updating the information, redirect the user to profile page
    header('location: ../profile.php');
?>