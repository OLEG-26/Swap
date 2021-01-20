<?php
    session_start();

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //establish connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    //check if a product id was passed into here from the homepage
    if(isset($_GET['product_id']))
    {
        //store the user id of the current user and product id for comparison, then set the product in a session variable to be used in the page that the user will be redirected
        $userID = $_SESSION['userID'];
        $productID = $_GET['product_id'];
        $_SESSION["productID"] = $productID;

        //get the username of the current user
        $user_query = $conn->query("SELECT Username FROM user_information WHERE User_info_id = $userID");
        $user_assoc = mysqli_fetch_assoc($user_query);
        $user = $user_assoc["Username"];
        
        //get the username of the seller of the selected product
        $seller_query = $conn->query("SELECT product_seller FROM product WHERE Product_id = $productID");
        $seller_assoc = mysqli_fetch_assoc($seller_query);
        $seller = $seller_assoc["product_seller"];

        //validate if the passed product id is a number, if not redirect back to homepage
        if(is_numeric($productID) === false)
        {
            header('location: index.php');
        }
        else
        {
            //if the current user is the seller of the selected product, redirect to productSeller.php, else, redirect to product.php
            if(strcmp($user, $seller) == 0)
            {
                header('location: ../productSeller.php');
            }
            else
            {
                header('location: ../product.php');
            }
        }
    }
?>