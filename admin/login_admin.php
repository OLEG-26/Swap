<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login_admin.css">
    <link rel="icon" href="image\white_logo.webp"/> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
    <title>SWAP Login for Admin</title>
</head>
<body>
    <!-- LOGO-->
  <header>
    <nav class="navbar justify-content-center">
      <div class="col-lg-4 col-md-4 col-sm-12">
       <img src="../image/white_logo.webp" alt="logo" >Swap
      </div>
  </header>
    
    <main>
       <div class="container">
         <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="image offset-3">
              <img src="image/black_logo.webp" alt="">     <!-- LOGO-->
            </div>
          </div>
          <!-- TITLE -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="login">
              <h1>Admin Login</h1>
              <form action="../php/admin_login.php" method="POST">
                <?php
                  if(isset($_SESSION["admin_error"]))
                  {
                    echo "<p style= color:red ;>$_SESSION[admin_error]</p>";
                  }
                  unset($_SESSION["admin_error"]);
                ?>
              <!-- INPUT SECTION IN ADMIN LOGIN PAGE-->
                <label for="uname">Username</label>
                <input type="text" placeholder="Username" name="username" required>

                <label for="pass">Password</label>
                <input type="password" placeholder="Password" name="password" required>

                <span class="psw">Forgot <a href="#">password?</a></span>

                <div class="forbtn">
                  <button type="submit" class="logbtn" name="login">Log in</button>
                </div>
              </form>

            </div>
          </div>
         </div>
       </div>
           
    </main>

<!-- CODE FOR FOOTER -->
    <footer>
      <div id="foots">
      <div class="container-fluid p-0">
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