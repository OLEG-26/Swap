<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./CSS/posts.css"/>
        <link rel="icon" href="./image/white_logo.webp"/> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
        <title>SWAP | Posts</title>
    </head>

    <body>
      <header>
        <nav class="navbar justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-12">
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
                         <a class="nav-link" href="index.php">Home</a>
                      </li>
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link active" href="posts.php">Posts</a>
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
        <div class="container-1 mx-auto col-lg-9 col-md-9 col-sm-12">
          <div class="row mx-auto justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <form id="form-1" action="php/posts_function.php" method="POST" enctype="multipart/form-data">
                
                <?php
                  if(isset($_SESSION["post_page_error"]))
                  {
                    $error_msg = $_SESSION["post_page_error"];
                    echo "<p style='color: red;'>$error_msg</p>";
                  }
                  unset($_SESSION["post_page_error"]);
                ?>

                <div>
                  <input type="file" name="imagefile" required>
                </div>

                <div>
                  <input type="text" id="item_name" name="item_name" placeholder="Item's Name" required>
                </div>

                <div>
                  <textarea type="text" id="description" name="description" required rows="5" class="form-control md-textarea" placeholder="item's description (state of item, parts, damage if it has, etc..)"></textarea>
                </div>

                <div>
                  <textarea type="text" id="preferred_items" name="preferred_items" required rows="3" class="form-control md-textarea" placeholder="Preferred item (description of item to swap)"></textarea>
                </div>

                <div class="postbtn">
                  <button class="post" type="submit">post</button>
                </div>

                <div class="cnclbtn">
                  <a href="index.php"><button class="cncl" type="button">cancel</button></a>
                </div>

              </form>
            </div>
          </div>
        </div>
     </main>
      <footer>
        <div id="foots">
        <div class="container-fluid justify-content-center p-0">
          <div class="row mx-auto">
            <div class="col-md-6 col-sm-12">
              <h1 class="text-dark">About Us</h1>
              <p class="text-muted">Swap website is created to let our User experience the new way of barter and making sure that they are at ease when using Swap by ensuring their safety, security, and mostly, to give them a convinient service at all times!</p>
            </div>
            <div class="col-md-6 col-sm-12">
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