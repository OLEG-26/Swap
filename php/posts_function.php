<?php
    session_start();

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //establish connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    //store values in variables
    $item_name = $_POST['item_name'];
    $description = $_POST["description"];
    $preferred_items = $_POST["preferred_items"];
    $_SESSION["post_page_error"] = "";

    //store image data in variables
    $file = $_FILES['imagefile'];

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

    //get the name of the current logged in user
    $userID = $_SESSION["userID"];
    $sql = "SELECT Username FROM user_information WHERE User_info_id = '$userID'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $current_user = $row["Username"];

    //check if the file type of image is allowed
    if(in_array($file_actual_ext, $allowed_ext))
    {
        //check if the file size of the image is less than 5mb
        if($file_size < 5000000)
        {
            //give the file we will upload a random unique id as a name so in case another user uplaoded an image with the same name it will not be overwritten
            $new_filename = uniqid('', true).'.'.$file_actual_ext;
            //initialize the destination where the file will be uploaded
            $fileDestination = '../uploads/product-image/'.$new_filename;
            //upload image to the uploads folder
            move_uploaded_file($file_tmp, $fileDestination);

            //save data into the database
            $sql = "INSERT INTO product (product_status, product_seller_id, product_seller,product_name, product_prefer_items, product_image, product_description, product_approval, product_date) VALUES ('open', $userID, '$current_user', '$item_name', '$preferred_items', '$fileDestination', '$description', 'pending', CURDATE())";
            $conn->query($sql);

            //redirect to homepage
            header('location: ../index.php');
        }
        else
        {
            $_SESSION["post_page_error"] = "The file size is to large, file should be less than 5mb.";
            header('location: ../posts.php');
        }
    }
    else
    {
        $_SESSION["post_page_error"] = "Invalid file type, allowed file types are: jpg, jpeg, png.";
        header('location: ../posts.php');
    }
?>