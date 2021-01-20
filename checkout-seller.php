<?php
  session_start();
  //database information
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "swap_information";

  //establish connection with the database
  $conn = new mysqli($servername, $username, $password, $database);

  $order_id = $_GET["order_id"];

  $result = $conn->query("SELECT * FROM order_ WHERE order_id = $order_id");
  $order_data = mysqli_fetch_assoc($result);

  $seller_id= $order_data["seller_id"];
  $buyer_id = $order_data["buyer_id"];
  $seller_status = $order_data["seller_status"];
  $buyer_status = $order_data["buyer_status"];

  //get the data of the seller
  $result = $conn->query("SELECT * FROM user_information WHERE User_info_id = $seller_id");
  $seller_data = mysqli_fetch_assoc($result);

  $seller_name = $seller_data["First_name"].' '.$seller_data["Last_name"];
  $seller_contact = '0'.$seller_data["Contact"];
  $seller_address = $seller_data["Address"];
  $seller_social = $seller_data["social_account"];

  //get the data of the buyer
  $result = $conn->query("SELECT * FROM user_information WHERE User_info_id = $buyer_id");
  $buyer_data = mysqli_fetch_assoc($result);

  $buyer_name = $buyer_data["First_name"].' '.$buyer_data["Last_name"];
  $buyer_contact = '0'.$buyer_data["Contact"];
  $buyer_address = $buyer_data["Address"];
  $buyer_social = $buyer_data["social_account"];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./CSS/checkout.css"/>
        <link rel="icon" href="./image/white_logo.webp"/> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
        <title>SWAP | Checkout</title>
    </head>

<body>
    <body>
        <header>
          <nav class="navbar justify-content-center">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
              <a  style="color: whitesmoke;" class="navbar-brand" href="index.php"><img src="./image/white_logo.webp" alt="logo" >Swap</a>
            </div>
  
            <div class="input-group col-lg-4 col-md-4 col-sm-12">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-append">
                  <button class="btn btn-light" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-12">
              <a id="profile" href="profile.php">Profile</a>
              <a class="ml-4" href="php/logout.php">Log out</a>   
            </div>
          </nav>
  
          <div class="navigationbar">
            <nav class="nav-bar navbar-expand-md navbar-light">
                <div class="container-fluid">
                  <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarCollapse"><span class="sr-only">Toggle navigation</span><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></button>
         
                <div class="collapse navbar-collapse" id="navbarCollapse">
                  <div class="nav-bar mx-auto">
                     <ul class="nav">
                        <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                           <a class="nav-link " href="index.php">Home</a>
                        </li>
                        <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                           <a class="nav-link" href="posts.php">Posts</a>
                        </li>
                        <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                           <a class="active nav-link" href="notifications.php">Notifications</a>
                        </li>
                     </ul>
                  </div>
                </div>
                </div>    
            </nav>
          </div>  
        </header>

        <main>
            <div class="section-1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <?php
                              echo "<div class='seller-side'>
                                      <h3 class='seller'>Seller Side</h3>
                                      <h5 class='item'>Item: Shoe</h5>
                                      <h5 class='seller-name'>Name: $seller_name</h5>
                                      <h5 class='contact-seller'>Contact No.: $seller_contact</h5>
                                      <h5 class='location-seller'>Location: $seller_address</h5>
                                      <h5 class='fb-acc-seller'>Facbook: $seller_social</h5>
                                      <h5 class='status-seller'>Status: $seller_status</h5>
                                    </div>";
                            ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <?php
                              echo "<div class='buyer-side'>
                                      <h3 class='buyer'>Buyer Side</h3>
                                      <h5 class='item'>Item: Bag</h5>
                                      <h5 class='buyer-name'>Name: $buyer_name</h5>
                                      <h5 class='contact-buyer'>Contact No.: $buyer_contact</h5>
                                      <h5 class=location-buyer'>Location: $buyer_address</h5>
                                      <h5 class='fb-acc-buyer'>Facebook: $buyer_social</h5>
                                      <h5 class='status-buyer'>Status: $buyer_status</h5>
                                    </div>";
                            ?>
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <a href="notifications.php"><button class="btncnl" type="button">Back</button></a>
                </div>
            </div>
        </main>

       <footer>
        <div id="foots">
        <div class="container-fluid">
          <div class="row mx-auto">
            <div class="col-md-6">
              <h1 class="text-dark">About Us</h1>
              <p class="text-muted">Swap website is created to let our User experience the new way of barter and making sure that they are at ease when using Swap by ensuring their safety, security, and mostly, to give them a convinient service at all times!</p>
            </div>
            <div class="col-md-6">
              <p class="pt-4 text-muted justify-content-center">Swap &copy2020  All Rights Reserved </p>
            </div>
        </div>
        </div>
      </div>
      </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   
</body>
</html>