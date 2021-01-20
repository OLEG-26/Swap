<?php
    session_start();
    //database info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //etsablish connection with database
    $conn = new mysqli($servername, $username, $password, $database);

    //get id of current user
    $user_id = $_SESSION['userID'];
    //store the data about the image
    $file = $_FILES['file'];

    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];
    $new_filename = "";
    $fileDestination = "";

    //get the file extenstion by separating it by the punctuation e.g. '.'
    $file_ext = explode('.', $file_name);
    //convert the file extension into lowecase in case it is in upper by getting the end a.k.a. last element of exploded file_ext
    $file_actual_ext = strtolower(end($file_ext));
    //specify the allowed file types that can be uploaded in the database
    $allowed_ext = array('jpg', 'jpeg', 'png');

    //check if the file type of profile picture is allowed
    if(in_array($file_actual_ext, $allowed_ext))
    {
        //check if the file size of the valid id is less than 5mb
        if($file_size < 5000000)
        {
            //give the file we will upload a random unique id as a name so in case another user uplaoded an image with the same name it will not be overwritten
            $new_filename = uniqid('', true).'.'.$file_actual_ext;
            //initialize the destination where the file will be uploaded
            $fileDestination = '../uploads/profile-picture/'.$new_filename;
            //call the function to actually upload the file from temporary location to the location in project folder
            move_uploaded_file($file_tmp, $fileDestination);
            //store the profile pic path to the database
            if($conn->query("UPDATE user_information SET profile_pic = '$fileDestination' WHERE User_info_id = $user_id") === TRUE)
            {
                echo "success";
            }
            else
            {
                echo $conn->error;
            }
            //refresh again to profile page
            header('location: ../profile.php');
        }
        else
        {
            echo "The valid ID file was too big, it should be less than 5mb";
        }
    }
    else
    {
        echo "Invalid file type for valid ID picture, allowed file types are jpg, jpeg, png";
    }
?>