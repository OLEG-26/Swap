<?php
    include "notifier.php";

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //establish connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    $order_id = $_GET["order_id"];
    $product_id = $_GET["product_id"];
    $seller = $_GET["seller_name"];
    $seller_id = $_GET["receiver_id"];
    $buyer = $_GET["buyer"];
    $buyer_id = $_GET["buyer_id"];
    
    if($conn->query("UPDATE order_ SET buyer_status = 'accepted' WHERE order_id = $order_id") === TRUE)
    {
        //notify the seller that the transaction has been finalized
        notify($product_id, $seller_id, $order_id, "seller", "Transction Finalized", "The transaction with $buyer has been finalized, both of you accepted the offer, click see more to view the contact details of the buyer.");
        //notify the buyer that the transaction has been finalized
        notify($product_id, $buyer_id, $order_id, "buyer", "Transction Finalized", "The transaction with $seller has been finalized, both of you accepted the offer, click see more to view the contact details of the seller.");
        //change the item status to closed
        $conn->query("UPDATE product SET product_status = 'closed' WHERE Product_id = $product_id");

        header('location: ../notifications.php');
    }
    else
    {
        echo $conn->error;
    }
?>