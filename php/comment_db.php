<?php
    session_start();

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //establish connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    //store the information about the commment in variables
    $product_id = $_SESSION["productID"];
    $commentor_id = $_SESSION["userID"];
    $offer = $_POST["offered_item"];
    $comment = $_POST["items_comment"];
    
    //insert the comment into the database
    $sql = "INSERT INTO comments_table (prod_id, user_id, comment_offer, comment_text) VALUES ($product_id, $commentor_id, '$offer', '$comment')";
    
    //if inserted successfully reload the page of the product else display the error
    if ($conn->query($sql) === TRUE)
    {
        header('location: ../product.php');
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>