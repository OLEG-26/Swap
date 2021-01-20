<?php
    session_start();

    $userID = $_SESSION['userID'];

    //database information
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'swap_information';

    //create the connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    //query to get select the currenlty logged in user from the database
    $result = $conn->query("SELECT * FROM user_information WHERE User_info_id = $userID");
    //convert the result of the query into an associative array
    $userdata = mysqli_fetch_assoc($result);

    //store each user data in a variable
    $username = $userdata["Username"];
    $firstname = $userdata["First_name"];
    $lastname = $userdata["Last_name"];
    $fullname = $firstname.' '.$lastname;
    $contact = '0'.$userdata["Contact"];
    $address = $userdata["Address"];
    $social = $userdata["social_account"];
    $user_dp = substr($userdata["profile_pic"], 3);
?>

<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./CSS/profile.css"/>
        <link rel="icon" href="./image/white_logo.webp"/> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
        <title>SWAP | Profile</title>
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
                         <a class="nav-link" href="posts.php">Posts</a>
                      </li>
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link " href="notifications.php">Notifications</a>
                      </li>
                   </ul>
                </div>
              </div>
              </div>    
          </nav>
        </div>  
      </header>

      <main>
        <div class="profile-part">
          <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
            <div class="container-1 ">
              <div>
                <h3 class="titlepage">My Profile</h3>
              </div>
 
              <?php
                echo "<div >
                        <img class='display-photo' src=$user_dp alt='display photo'>
                      </div>";
              ?>
            

              <div>
                  <form class="form" action="php/upload_dp.php" method="POST" id="form" enctype="multipart/form-data">
                    <label for="username">Profile Picture: </label>
                    <input type="file" name="file"><br>
                    <input type="submit" value="Submit">
                  </form>
              </div>

<br>

              <?php
                echo "<div> 
                        <h5 class='user-name'>$username</h5>
                      </div>";

                echo "<div class='basic-info'>
                        <h5 class='name'>$fullname</h5>
                      </div>";
              ?>
            </div>
          </div>  

          
          <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
            <div class="for-checkout-info">
              <h3>Personal Information</h3>
              <div class="info">
                <?php
                  echo "<div>
                          <h5 class='Fullname'>Fullname: $fullname</h5>
                        </div>";
                  echo "<div>
                          <h5 class='con-no'>Contact Number: $contact</h5>
                        </div>";
                  echo "<div>
                        <h5 class='address'>Address: $address</h5>
                        </div>";      
                  if(strcmp('Not yet registered', $social) == 0)
                  {
                    echo "<div>
                          <h5 class='facebook'>Social Media Account: $social</h5>
                        </div>";
                  }
                  else
                  {
                    echo "<div>
                            <h5>Social Media Account: </h5>
                            <a href='#'><h5 class='facebook'>$social</h5></a>
                          </div>";
                  }
                ?>
    
              </div>
    
              <div class="btn">
                <a  class="editbtn" href="infoEdit.php">Edit Info</a> 
              </div>

            </div>
          </div>

        </div>
      </main>
    
      <footer>
        <div id="foots">
        <div class="container-fluid p-0">
          <div class="row text-left mx-auto">
            <div class="col-md-6">
              <h1 class="text-dark">About Us</h1>
              <p class="text-muted">Swap website is created to let our User experience the new way of barter and making sure that they are at ease when using Swap by ensuring their safety, security, and mostly, to give them a convinient service at all times!</p>
            </div>
            <div class="col-md-6 mx-auto">
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