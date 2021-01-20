<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./CSS/product.css"/>
        <link rel="icon" href="./image/white_logo.webp"/> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
        <title>SWAP</title>
    </head>

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
                         <a class=" active nav-link " href="index.php">Home</a>
                      </li>
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link" href="posts.php">Posts</a>
                      </li>
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link" href="notifications.php">Notifications</a>
                      </li>
                   </ul>
                </div>
              </div>
              </div>    
          </nav>
        </div>  
      </header>

     <main>
       <!-- this is used for buyers -->
      <div class="section-1">
        <div class="container">
        <?php
            session_start();
            //database information
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "swap_information";

            //establish connection with the database
            $conn = new mysqli($servername, $username, $password, $database);

            //check if the product id session variable has a value
            if(isset($_SESSION["productID"]))
            {
                //store product id into a variable
                $product_id = $_SESSION["productID"];

                //check if the product id is an integer, if it is not, display an error message, if it is an integer, retrieve product information from the database
                if(is_numeric($product_id) === false)
                {
                  header('location: index.php');
                }
                else
                {
                  $result = $conn->query("SELECT * FROM product WHERE Product_id = $product_id");
                  $product_data = mysqli_fetch_assoc($result);
                  //print_r( mysqli_fetch_assoc($result));
                  $seller = $product_data['product_seller'];
                  $name = $product_data['product_name'];
                  $product_desc = $product_data['product_description'];
                  $preferred_item = $product_data['product_prefer_items'];
                  $image = substr($product_data["product_image"], 3);
                  $product_status = strtoupper($product_data["product_status"]);
                }
            }
          ?>
            <div class="row">
                <div class="col-md-6 col-sm-12 pt-5">
                  <?php

                    echo "<div class='seller-name'>
                            <h5 class='sellersname'>Seller: $seller</h5>
                          </div>";
                    echo "<div class='image'>
                            <a href=$image><img class='image-1' src=$image alt=$name></a>
                          </div>";
                    echo "<div class='description'>
                            <h5 class='item-name'>$name</h5>
                            <p class='item-desc'>Item Description: $product_desc</p>
                            <p class='item-pref'>Preferred Item:</p>
                            <p class='itempref'>$preferred_item</p>
                           </div>";
                  ?>
                </div>

                <div class=" col-md-6 col-sm-12 ">
                  <?php
                      echo "<div class='available'>
                                <h6 class='status'>STATUS: $product_status</h6>
                                <h6 class='stats'></h6>
                                <h4>Offers:</h4>
                            </div>";
                  ?>

                  <div class="com"> 

                  <?php
                    //retrieve all the comments from the database that has the same product_id as the selected item
                    $sql = "SELECT * FROM comments_table WHERE prod_id = $product_id";
                    $result = $conn->query($sql);

                    //loop through the comments that wasa retrieved from the database
                    while($row = mysqli_fetch_assoc($result))
                    {
                      //get the username of the commentor
                      $commentor_query = $conn->query("SELECT * FROM user_information WHERE user_info_id = $row[user_id]");
                      $commentor_assoc = mysqli_fetch_assoc($commentor_query);
                      $commentor = $commentor_assoc["Username"];
                      $commentor_pic = substr($commentor_assoc["profile_pic"], 3);
                      

                      //display the comment
                      echo "<div class='comments'>
                              <div class='profile'>
                                <h5 class='commentor-name'><img class='display-photo' src=$commentor_pic alt='diplay photo'>$commentor</h5>
                              </div>
                              <div class='user-comment'>
                                <p stye><b>Offered Item: $row[comment_offer]</b></p>
                                <p class='user-comm'>$row[comment_text]</p>
                              </div>
                            </div>";
                    }       
                  ?>    
                </div>

                <div>
                  <?php
                    $userID = $_SESSION["userID"];
                    //get the username of the current user
                    $user_query = $conn->query("SELECT Username FROM user_information WHERE User_info_id = $userID");
                    $user_assoc = mysqli_fetch_assoc($user_query);
                    $curr_user = $user_assoc["Username"];

                    echo "<div class='name'>
                            <h5 class='profilename'>$curr_user</h5>
                          </div>";

                    if(strcmp(strtolower($product_status), "open") === 0)
                    {
                      echo "<div class='comment'>
                              <form action='php/comment_db.php' method='post'>
                                <textarea type='text' id='items_preferred' name='offered_item' required rows='2' column='100' class='form-control md-textarea' placeholder='Item Name...'></textarea>
                                <br>
                                <textarea type='text' id='items_comment' name='items_comment' required rows='3' column='100' class='form-control md-textarea' placeholder='comment here...'></textarea>
                                <button class='post' type='submit'>post</button>
                              </form>
                            </div>";
                    }
                    else
                    {
                      echo "<div class='comment'>
                              <form action='php/comment_db.php' method='post'>
                                <textarea type='text' id='items_preferred' name='offered_item' required rows='2' column='100' class='form-control md-textarea' placeholder='Offers are closed' disabled></textarea>
                                <br>
                                <textarea type='text' id='items_comment' name='items_comment' required rows='3' column='100' class='form-control md-textarea' placeholder='This item is already sold' disabled></textarea>
                                <button class='post' type='submit'>post</button>
                              </form>
                            </div>";
                    }
                  ?>

                  <br>
                </div>
              </div>
            </div>
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