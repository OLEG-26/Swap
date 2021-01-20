<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./CSS/style.css"/>
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

          <form class="input-group col-lg-4 col-md-3 col-sm-12" action="search.php" method="post">
                <input type="text" class="form-control" placeholder="Search" name="search_text">
                <div class="input-group-append">
                  <button class="btn btn-light" type="submit" name="search">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
          </form>
          
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
        <div class="cards text-center">
          <div class="container-fluid p-0 m-0 align-items-center justify-content-center d-flex"> 
            <div class="row w-100 p-0 w-0"> 
                <?php
                
                  //database information
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $database = "swap_information";

                  //establish connection with the database
                  $conn = new mysqli($servername, $username, $password, $database);

                  //keyword(s) to be searched
                  $word = strtolower($_POST["search_text"]);

                  //query to get all products stored in the database
                  $result = $conn->query("SELECT * FROM product WHERE product_approval = 'approved'");

                  //check if the query result is not empty (if there is/are product(s) stored in the database)
                  if(mysqli_num_rows($result) > 0)
                  {
                    //if there are products stored in the database loop through each of them
                    while($row = mysqli_fetch_assoc($result))
                    {                        
                      $product_name = strtolower($row["product_name"]);
                      
                      if(strcmp($word, $product_name) == 0)
                      {
                        //store the product image path and the product id of the current loop iteration
                        $img_dir = substr($row["product_image"], 3);
                        $product_id = $row["Product_id"];
                        
                        //echo all the data as a prouct card that will be shown in the homepage of the website
                        echo "<div class='col-lg-3 col-md-4 mb-3'> 
                        <div class='card mx-auto'> 
                            <img class='card-img-top' src= $img_dir alt='product image'> 
                            <div class='card-body'> 
                                <h5 class='card-title'>$row[product_name]</h5>
                                <p class='card-text'>$row[product_description]</p> 
                                <a style='outline: none;' class='btnclk' href= 'productWoutAcc.php?product_id=$product_id'>check here!</a> 
                            </div> 
                            </div> 
                        </div>";
                      }
                    }
                  }
                ?>

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