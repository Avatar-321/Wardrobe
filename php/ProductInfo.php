<!DOCTYPE html>
<html lang="en">
 <!DOCTYPE html>
    <html>
        <head>
        <?php
    session_start();
    @include('DBC.PHP');
    if (isset($_SESSION['User'])) {
        $User_ID = $_SESSION['User_ID'];
        
    } 
    ?>
            <title>Product Page </title>
            <meta name="viewport" content="width=device-width; intinal-scale=1" >
       
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
            <link rel="stylesheet" href="Productpg.css">

        
           <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
           <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <style>
            .buy-btn {
    border: none;
    border-radius: 4px;
    padding: 5px 5px;
    font-weight: 400;
    color: white;
    background-color: var(--main-color);
    opacity: 1;
    transition: 0.3s all;

     }
        </style>
        </head>
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
            <form class="searchbr navbar-nav mx-auto mb-2 mb-lg-0" role="search">
                  <div class="input-group w-200">
                    <span class="input-group-text" id="basic-addon1">
                    <input class="btn btn-outline-light" id="search" name="srch" value="Search" type="submit" style="height: 40px;">
                    </span>
                    <input type="text" class="form-control"  aria-label="Input group example" aria-describedby="basic-addon1">
                    <?php
                                if (isset($_POST['searchbtn'])) {
                                    $text = $_POST['srchtext'];
                                    $sql = "SELECT * FROM product WHERE Pr_Name LIKE '%{$text}%' LIMIT 5";
                                    if ($result = mysqli_query($conn, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<div class="row" style="margin-bottom: 5px; cursor: pointer;">';
                                                echo '<div class="col-md-3">';
                                                echo '<img src="UploadImage/' . $row['Image'] . '" class="img-fluid rounded">';
                                                echo '</div>';
                                                echo '<div class="col-md-9 srchtxt" style="padding-top:20px"><a onclick="loadProduct('.$row['Pr_Id'].')">' . $row['Pr_Name'] . '</a></div>';
                                                echo '</div>';
                                            }
                                            echo '<button id="clear-btn" class="btn btn-sm btn-primary">Clear</button>';
                                        }
                                    } else {
                                        echo '<div class="col-md-9" style="padding-top:20px">Products not found</div>';
                                    }
                                }
                                ?>
                  </div>
    
                </form>
           </nav>
          
        </header>

<body>

<?php 
    if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $productInfo;
    $errorQTYMSG = "";
    $successMSG = "";
    if (isset($_SESSION['User_ID'])) {
        $User_ID = $_SESSION['User_ID'];
    } 
    }
    if (isset($_POST["add_to_cart_btn"])) {
        $errorQTYMSG = "";
        if (isset($_SESSION['User_ID'])) {
            $sql = "SELECT Qt FROM product WHERE Pr_Id=$product_id";
            $sqlResult = mysqli_query($conn, $sql);
            $productQTY =  mysqli_fetch_array($sqlResult);
            $QTY =  $_POST['qty'];
            if ($productQTY['Qt'] >= $QTY) {
                $sql = "INSERT INTO cart (Pr_Id, User_id ,qty) VALUES('$product_id', '$User_ID','$QTY')";
                if (mysqli_query($conn, $sql)) {
                    $successMSG = "Product added to cart";
                } else {
                    $errorQTYMSG = "Something went wrong!";
                };
            } else {
                $errorQTYMSG = "Only " . $productQTY['Qt'] . " available";
            }
        } else {
            $errorQTYMSG = "Please login";
        }
    }
    ?>
    <!-- header ends -->
    <!-- product -->

    <form method="POST">
        <?php

        $sql = "SELECT * FROM product WHERE Pr_Id=$product_id";
        $sqlResult = mysqli_query($conn, $sql);
        if (mysqli_num_rows($sqlResult)) {
            $productInfo = mysqli_fetch_assoc($sqlResult);
        } else {
            echo "0 results";
        }
        ?>
        <section class="container sproduct my-1 pt-2">
            <div class="row mt-4 ">
                <div class="col-lg-5 col-md-12 col-12">
                    <img class="img-fluid pb-1" width="80%" src="./UploadImage/<?php echo $productInfo['Image'] ?>" id="MainImg" alt="">
                     </div> 
                     </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12 text">
                    <h3 class="py-4"><?php echo $productInfo['Pr_Name'];?>(<?php echo $productInfo['category']; ?>)</h3>
                    <h2><?php echo $productInfo['Price']; ?> LKR</h2>
                    <input type="number" value="1" name="qty">
                    <button class="buy-btn" name="add_to_cart_btn">Add to Cart</button>
                    <p style="color: black; margin: top 10px;">(<?php echo $productInfo['Qt']; ?> Available) </p>
                    <p style="color: red;"><?php echo $errorQTYMSG; ?></p>
                    <p style="color: green;"><?php echo $successMSG; ?></p>
                    <h4 class="mt-5 mb-5">Product Details</h4>
                    <span style="color: grey; text-align:left" class="text"><?php echo $productInfo['Discrip']; ?></span>
                </div>
    </form>
    </div>
    </section>
    <!-- related products -->
    <form method="POST">
        <div class="small-container">
            <h1 class="headings">RECENT PRODUCTS</h1>

            <div class="row" style="margin: 3px ;">
            
            
                <?php
                $sql = "SELECT * FROM `product` ORDER by rand() LIMIT 3";
                if ($result = mysqli_query($conn, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo ' <div class="col-4">';
                            echo ' <img src="./UploadImage/' . $row['Image'] . '" alt="">';
                            echo ' <h4>' . $row['Pr_Name'] . '</h4>';
                            echo '<p>' . $row['Price'] . ' LKR</p>';
                            echo ' <button type="button" class="btns" onclick="loadProduct()' . $row['Pr_Id'] . ')">Explore</button>';
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
    <!-- Footer -->
    <?php @include('footer.php') ?>

    <script>
        // to transfer the product id via url
        function loadProduct(productID) {
            // console.log(productID);
            var origin = window.location.origin;
            window.location.href = origin + "/Wardrobe/ProductInfo.php?product_id=" + productID;
            // console.log(origin);

        }
        <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./productinfo.js"></script>
</body>


</html>