<!DOCTYPE html>
<html>
    <head>
        <title> Home-Page </title>
        <meta name="viewport" content="width=device-width; intinal-scale=1" >
   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="Css/Style.css">
    
       <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
     .navbar{
     z-index:5; 
     }
     Carousel{
      position:absolute;
      width:100%;
      top:0;
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
        <a href="MainPage.php"><img src="Images/logow.jpg" width="150px" height="90px"></a>
          
          
        
            <div class="icons">
              
                <a href="Login1.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" class="bi bi-person-fill m-2" viewBox="0 0 16 16">
                  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg></a>
                <a href="Adminloging.html"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"   class="bi bi-person-workspace m-2" viewBox="0 0 16 16">
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
          <a class="navbar-brand ps-5" href="#products">Collections</a>
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
                <input class="btn btn-outline-light" id="search" name="srch" value="Search" type="submit" style="height: 38px;">
                <input type="text" class="form-control"  aria-label="Input group example" aria-describedby="basic-addon1" name="srchtext" id="srchtext">
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
                            </div>
                            </div>
                           </div>
                          </div>
                          <div>

            </form>
            </nav>
      
    </header>

        
    <section>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Images/Cloths/slider-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="Images/Cloths/slider-3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="Images/Cloths/slider1.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      </div>
    </section>


    <section>
      <div class="container" id="products">
        <div class="row justify-content-center">
      <h4 class="heading mt-3 text-center">Our Products</h4>
      <br>

      <div class="col-md-4 pb-5 pt-4">
      <div class="card ps-2 shadow " style="width: 18rem; ">
        <div class="inner">
        <img src="Images/Cloths/kids/kidspr.jpg" class="card-img-top" alt="...">
      </div>
        <div class="card-body text-center">
          <h5 class="card-title">Kids</h5>
          <p class="card-text">Children's clothing is often more casual than adult clothing, fit for play and rest.</p>
          <a href="kids.php" class="btn btn-primary">Kids' store</a>
        </div>
         </div>
        </div>
      <div class="col-md-4 pb-5 pt-4">
        <div class="card ps-2 shadow" style="width: 18rem; ">
          <div class="inner">
          <img src="Images/Cloths/men/menimg.jpg" class="card-img-top" alt="...">
        </div>
          <div class="card-body text-center">
            <h5 class="card-title">Men</h5>
            <p class="card-text">“Whoever said that money can’t buy happiness, simply didn’t know where to go shopping.” — Bo Derek</p>
            <a href="men.php" class="btn btn-primary">Men's Store</a>
          </div>
          </div>
         </div>
        <div class="col-md-4 pb-5 pt-4">
          <div class="card ps-2 shadow" style="width: 18rem; ">
            <div class="inner">
            <img src="Images/Cloths/women/womenpr.jpg" class="card-img-top" alt="...">
          </div>
            <div class="card-body text-center">
              <h5 class="card-title">Women</h5>
              <p class="card-text">women's clothing is a line of ultimate representation of a women's body confidence that will make her all the more stylish and glamorous. </p>
              <a href="women.php" class="btn btn-primary">Women's Store</a>
            </div>
             </div>
            </div>
        </div>
        </div>
      
      
    </section>


    


  


 <?php @include('footer.php') ?>

  <script type="text/javascript">
    function loadProduct(productID) {
        // console.log(productID);
        var origin = window.location.origin;
        window.location.href = origin + "/Wardrobe/productinfo.php?product_id=" + productID;
        // console.log(origin);

    }
    
    
    let cartItem = document.querySelector('.search-items-container');

        document.querySelector('#search').onclick = () => {
            cartItem.classList.toggle('active');
            navbar.classList.remove('active');
            searchForm.classList.remove('active');
        }
    </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
    </html>


