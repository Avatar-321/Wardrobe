<!-- <?php
session_start();
     echo $_SESSION['User'] . " ". $_SESSION['User_ID'];
     ?> -->
<!DOCTYPE html>
<html>
    <head>
        <title> Men </title>
        <meta name="viewport" content="width=device-width; intinal-scale=1" >
   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="Productpg.css">
    
       <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <style>
    h4{
      color: white;
    }
    
    </style>
     <body>
     <?php

if (isset($_SESSION['user'])) {
    $isUserLogged = true;
}

@include('DBC.PHP');
?>
      
      <header class="head">
        
        <nav class="navbar navbar-expand-lg bg-light shadow p-3  bg-body rounded  navbar-default navbar-fixed-top">
        <div class="container">
        <a href = "MainPage.php"><img src="Images/logow.jpg" width="150px" height="90px"></a>
      
            <div class="icons">
              
                <a href="Login1.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-person-fill m-2" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></a>
                <a href="Adminloging.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"   class="bi bi-person-workspace m-2" viewBox="0 0 16 16">
                  <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                  <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z"/>
                </svg></a>
                <a href="cart.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"   class="bi bi-cart3 m-2" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg></a>

          </div>
        
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#products">Collections</a>
          <button class="navbar-toggler"  type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
           <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle h-25" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="men.php">Mens' wear</a></li>
                  <li><a class="dropdown-item" href="women.php">ladies'wear</a></li>
                  <li><a class="dropdown-item" href="kids.php">Kids'wear</a></li>
                </ul>
               </li>
              </ul>
          </div>
        </div>
        <form class="d-flex" action="MainPage.php" method="POST">
            <div class="searchbr navbar-nav mx-auto mb-2 mb-lg-0" role="search">
              <div class="input-group w-200">
                <input class="btn btn-outline-light" id="search" name="srch" value="Search" type="submit" style="height: 40px;">
                <input type="text" class="form-control" placeholder="Search" aria-label="Input group example" aria-describedby="basic-addon1" name="srchtext" id="srchtext">
                <!-- <div class="auto-com" id="auto-com"> -->
                <div style="position: absolute;">
                <?php
                            if (isset($_POST['srch'])) {
                                $text = $_POST['srchtext'];
                                $sql = "SELECT * FROM product WHERE Pr_Name LIKE '%{$text}%' LIMIT 5";
                                if ($result = mysqli_query($conn, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<div class="row" style=""; cursor: pointer;">';
                                            echo '<div class="col-md-3">';
                                            echo '<img src="UploadImage/' . $row['Image'] . '" class="img-fluid rounded">';
                                            echo '</div>';
                                            echo '<div class="col-md-9 srchtxt" style=""><a onclick="loadProduct('.$row['Pr_Id'].')">' . $row['Pr_Name'] . '</a></div>';
                                            echo '</div>';
                                        }
                                        echo '<button id="clear-btn" class="btn btn-sm btn-primary">Clear</button>';
                                    }
                                } else {
                                    echo '<div class="col-md-9" style="padding-top:20px">Products not found</div>';
                                }
                            }
                            ?>
                            </sdiv>
                            </div>
                           </div>
                          </div>
                          <div>

            </form>
       </nav>
      
    </header>

<body>
 
    <?php 
     @include('DBC.php');
     $db = '';
    ?>
    <form method="POST">
        <div class="small-container">
            <h1 class="headings">Mens' PRODUCTS</h1>

            <div class="row">
                <?php
                $sql = "SELECT * FROM product WHERE category='Mens_Ware' ORDER by rand() LIMIT 24";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                          
                            echo ' <div class="col-4">';
                            echo ' <img src="./UploadImage/' . $row['Image'] . '" alt="">';
                            echo ' <h4>' . $row['Pr_Name'] . '</h4>';
                            echo '<p>' . $row['Price'] . ' LKR</p>';
                            echo ' <button type="button" class="btns" onclick="loadProduct(' . $row['Pr_Id'] . ')">Explore</button>';
                            echo '</div>';
                        }
                    } else {
                        echo "No Products found";
                    }
                } else {
                    echo "Products not found";
                }
                ?>
                
            </div>
        </div>
    </form>
        





        <div class="footer text-center text-lg-start bg-dark text-muted" id="footer">
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
              <div class="me-5 d-none d-md-block">
                <span>Get connected with us on social networks:</span>
              </div>
              <div>
                <a href="" class="me-5 text-reset"></a>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                     </svg></a>
                </a>
                <a href="" class="me-4 text-reset">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                  </svg>
                </a>
                <a href="" class="me-4 text-reset">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                  </svg>
                </a>
                <a href="" class="me-4 text-reset">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                  </svg>
                </a>
                
              </div>
            </section>
             <section class="">
              <div class="container text-center text-md-start mt-5">
                 <div class="row mt-3">
                 <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-1">
                    <h6 class="text-uppercase fw-bold mb-1"><i class="fas fa-gem me-3"></i>Daisy’s Wardrobe</h6>
                    <p>“Daisy’s Wardrobe’ Fasion Market was established in 2021 and is one of the most advanced clothing  market in Kandy. We also have one of the most extensive supply distribution center which brings together thousands of manufacturers from all around Country with the latest style and the most competitive price.</p>
                  </div>
                 
                  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-1">
                    <h6 class="text-uppercase fw-bold mb-1">Products</h6>
                    <p><a href="men.html" class="text-reset">Men</a></p>
                    <p><a href="women.html" class="text-reset">Women</a></p>
                    <p><a href="kids.html" class="text-reset">Kids</a></p>
                  </div>
          
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-1">
                    <h6 class="text-uppercase fw-bold mb-1">Useful links</h6>
                    <p><a href="#!" class="text-reset">Pricing</a></p>
                    <p><a href="#!" class="text-reset">Settings</a></p>
                    <p><a href="#!" class="text-reset">Orders</a></p>
                    <p><a href="#!" class="text-reset">Help</a></p>
                  </div>
                 
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-1">
                   
                    <h6 class="text-uppercase fw-bold mb-1">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> NO ; 123/B, Kandy.</p>
                    <p><i class="fas fa-envelope me-3"></i>info@Wardrobeclothing.com</p>
                    <p><i class="fas fa-phone me-3"></i> + 94 989898543</p>
               <p><i class="fas fa-print me-3"></i> + 94 112345678</p>
            </div>
          </div>
        </div>
    </section>
    <div class="text-center " style="background-color: rgba(0, 0, 0, 0.05);"> © 2021 Copyright:</div>
        </div>
        <script>
    productID = $productID;
    // to transfer the product id via url
    function loadProduct(productID) {
        // console.log(productID);
        var origin = window.location.origin;
        window.location.href = origin + "/Wardrobe/ProductInfo.php?product_id=" + productID;

        // console.log(origin);

    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>