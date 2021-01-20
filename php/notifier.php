<?php
    //database info
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //etsablish connection with database
    $conn = new mysqli($servername, $username, $password, $database);

    $buyer_id = $_GET["buyer_id"];
    $seller_id = $_GET["seller_id"];
    $product_id = $_GET["product_id"];
    $product_name = $_GET["product_name"];
    $seller_name = $_GET["seller_name"];
    $comment_offer = $_GET["comment_offer"];

    function notify($prod_id, $user_id, $order_id, $notif_type, $notif_header, $notif_text){
        //database info
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "swap_information";
    
        //etsablish connection with database
        $conn = new mysqli($servername, $username, $password, $database);
        
        //push the notification to the database
        $sql = "INSERT INTO notifications (product_id, customer_id, order_id, notification_type, notification_header, notification_details) VALUES ($prod_id, $user_id, $order_id, '$notif_type', '$notif_header', '$notif_text')";

        if($conn->query($sql) !== TRUE)
        {
            echo $conn->error;
        }
    }

    //save the transaction into the database
    $sql = "INSERT INTO order_ (buyer_id, seller_id, product_id, offer, seller_status, buyer_status) VALUES ($buyer_id, $seller_id, $product_id, '$comment_offer', 'accepted', 'pending')";
    
    if($conn->query($sql) === TRUE)
    {
        $last_id = $conn->insert_id;
    }
    else
    {
        echo $conn->error;
    }
    
    //notify the seller that he/she accepted an offer
    notify($product_id, $seller_id, $last_id, "seller", "You have accepted an offer", "You have accepted an offer for your item $product_name, please wait for the buyer to accept the offer.");
    //notify the buyer that the seller has accepted his/her offer
    notify($product_id, $buyer_id, $last_id, "buyer", "Your offer has been accepted", "Seller $seller_name has accepted your $comment_offer offer for his/her $product_name, please confirm the offer to complete transaction.");
    header("location: ../index.php");
?>