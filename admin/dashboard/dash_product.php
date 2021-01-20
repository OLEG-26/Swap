<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="dash_product.css"/>
        <link rel="icon" href="image\white_logo.webp"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
        <title>SWAP | Dashboard</title>
    </head>

    <body>
      <header>
        <nav class="navbar justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-12 ">
            <a  style="color: whitesmoke;" class="navbar-brand" href="../mainpage/adminpage.html"><img src="../image/white_logo.webp" alt="logo" >  Swap Admin</a>
          </div>
        </nav>
      </header>

      <!-- CODE FOR THE SIDEBAR-->
      <div class="sidebar">
        <a href="../mainpage/adminpage.html"><i class="fa fa-fw fa-user-circle"></i>   Admin</a>
        <a href="../dashboard/dash_user.php"><i class="fa fa-fw fa-address-book"></i>  Manage Account</a>
        <a class="active" href="../dashboard/dash_product.php"><i class="fa fa-fw fa-shopping-cart"></i>  Manage Products</a>
      </div>
 
      <div class="content">
        <div class="container">
                <h2 class="page-title"><b>Manage Products</b></h2>
                <div class="table-box">
                  <table>
                    <!-- CODE FOR THE HEADER OF THE TABLE IN MANAGE PRODUCT-->
                    <tr>
                      <th class="acc_id">PRODUCT ID</th>
                      <th>PRODUCT NAME</th>
                      <th>DESCRIPTION</th>
                      <th>STATUS</th>
                      <th>SELLER</th>
                      <th>PREFERRED ITEM</th>
                      <th>DATE</th>
                      <th colspan="2">ACTION</th>
                    </tr>

                    <?php
                      //database information
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $database = "swap_information";

                      //establish connection with the database
                      $conn = new mysqli($servername, $username, $password, $database);

                      //query to get all products stored in the database
                      $result = $conn->query("SELECT * FROM product WHERE product_approval = 'pending'");

                      if(mysqli_num_rows($result) > 0)
                      {
                        while($row = mysqli_fetch_assoc($result))
                        {
                          echo "<tr>
                                  <td>$row[Product_id]</td>
                                  <td>$row[product_name]</td>
                                  <td>$row[product_description]</td>
                                  <td>$row[product_status]</td>
                                  <td>$row[product_seller]</td>
                                  <td>$row[product_prefer_items]</td>
                                  <td>$row[product_date]</td>
                                  <td><a href='../../php/post_approval.php?product_id=$row[Product_id]' class='publish'>Approve</a></td>
                                  <td><a href='../../php/post_delete.php?product_id=$row[Product_id]' class='delete'>Delete</a></td>
                                </tr>";
                        }
                      }
                    ?>

                
                  </table>
                </div>
                
              </div>
          </div>

        
      <!-- FOOTER -->
      <footer>
        <div class="footer">
              <h1 class="text-dark">About Us</h1>
              <p class="text-muted">Swap website is created to let our User experience the new way of barter and making sure that they are at ease when using Swap by ensuring their safety, security, and mostly, to give them a convinient service at all times!</p>
            </div>
           </div>

        <div id="rights" class="col-md-12">
          <p class="pt-4 text-muted justify-content-center">Swap &copy2020  All Rights Reserved </p>
        </div>
      </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>