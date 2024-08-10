
<style>
  .navbar{
 
 width: 100%;
 margin-top: 0 auto;
 padding-left: 10px;
 padding-right: 10px;
 height: 100px;
 

}
   
/* .head{
 position: sticky;
 z-index: 100;
} */
 



 




/*
.btn:hover {
   background-color: rgb(224, 189, 30);
   
 }
 */
.home span{
   color: blue;
}



 
 
 .searchbr{
   width: 500px;
   border-radius: 0px 5px 5px 0px;
 }

 .btnsearch{
   height: 38px;
   border-radius: 0px 5px 5px 0px;
   border: 0px solid;
   background-color: beige;
 }
 .form-control{
   letter-spacing: 3px;
   
 }

 




.container{
   margin-top: 0 auto;
   padding-left: 10px;
   padding-right: 10px;

}

.icons{
   float: right;
 
  padding: 15px;
}



.mbtn{
 background-color: transparent;
}

.carousel-item{
 height: 500px;
}

.container {
 position: relative;
 width: 50%;
}
</style><header class="head">
  <nav class="navbar navbar-expand-lg bg-light shadow p-3  bg-body rounded  navbar-default navbar-fixed-top">
        <div class="container">
         <img src="Images/logow.jpg" width="100px" height="55px">
          
            
            <form class="searchbr navbar-nav mx-auto mb-2 mb-lg-0" role="search">
              <div class="input-group w-200">
                <span class="input-group-text" id="basic-addon1">
                  <button class="searchbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="search"class="bi bi-search" name="search"viewBox="0 0 16 16">
             <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
             </svg></button>
                </span>
                <input type="text" class="form-control" placeholder="Search" aria-label="Input group example" aria-describedby="basic-addon1">
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
          <button class="btn btn-danger" style=" margin-left: 25px ;margin-right: 25px;margin-top: 10px; margin-bottom: 10px; border-radius: 5%;">NEW arrivals</button>
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
       </nav>
      
    </header>