<?php
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "swap_information";

    //establish connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    $product_id = $_GET["product_id"];

    if(is_numeric($product_id) === true)
    {
        $sql = "DELETE FROM product WHERE Product_id = $product_id";

        if($conn->query($sql) === TRUE)
        {
            header('location: ../admin/dashboard/dash_product.php');
        }
        else
        {
            echo "Error updating record: " . $conn->error;
        }
    }
    else
    {
        echo "ERROR: INVALID PRODUCT ID";
    }
?>