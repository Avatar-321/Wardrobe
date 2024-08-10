<?php


@include 'DBC.php';
// Product insert
// if (isset($_POST['add_product'])) {
if (isset($_GET['del'])) {
   $product_name = $_POST['product_name'];
   $product_Id = $_POST['product_id'];
   $product_price = $_POST['product_price'];
   $product_des = $_POST['product_des'];
   $product_qty = $_POST['product_qty'];
   $product_cat = $_POST['product_cat'];
   $product_image1 = $_FILES['product_image1']['name'];
   $product_image_tmp_name1 = $_FILES['product_image1']['tmp_name'];

   


// Delete option

   $id = $_GET['del'];
   mysqli_query($conn, "DELETE FROM product  WHERE Pr_Id = $id");
   mysqli_query($conn, "ALTER TABLE product AUTO_INCREMENT = 1");
   //header('location:adminpage.php');
   $message[] = 'Succsessfully Deleted!';
   
};
if (isset($_POST['goHome'])) {
   @include('logout.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <!-- <link rel="stylesheet" href="Admin.css"> -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
   .formContainer{
      boder-radius: 10%;
      
   }
   body{
      background: linear-gradient(-20deg, #2b5876 0%, #4e4376 100%);
   }
   .container {
    max-width: 1200px;
    padding: 2rem;
    margin: 0 auto;
}
.container {
    max-width: 1200px;
    padding: 2rem;
    margin: 0 auto;
}

.formContainer.centered {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    border-radius: 10%;
}

.formContainer form {
    max-width: 50rem;
    margin: 0 auto;
    padding: 2rem;
    border-radius: .5rem;
    
}

.formContainer form h3 {
    text-transform: uppercase;
    color: white;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 2.5rem;
}

.formContainer form .box {
    width: 100%;
    border-radius: .5rem;
    padding: 1.2rem 1.5rem;
    font-size: 1.7rem;
    margin: 1rem 0;
    background: white;
    text-transform: none;
}

.products {
    margin: 2rem 0;
    width: 200px;
    margin-left: 30%;
}

.products .tblproduct {
    width: 100%;
    text-align: center;
    
}

.products .tblproduct thead {
    background:linear-gradient(to right bottom, #5e14a4, #4b1f99, #3a248c, #2a267f, #1e2670);
    color: white;
    width:200px;
}

.products .tblproduct th {
    padding: 1rem;
    font-size: 2rem;
    
}

.products .tblproduct td {
    padding: 1rem;
    font-size: 2rem;
    border-bottom: .1rem solid black;
}

@media (max-width:991px) {
    html {
        font-size: 55%;
    }
}

@media (max-width:768px) {
    .products {
        overflow-y: scroll;
    }
    .products .tblproduct {
        width: 80rem;
    }
}

@media (max-width:450px) {
    html {
        font-size: 50%;
    }
}
 .lbl{
    font-size: 20px;
} 
.buttons {
    display: block;
    width: 100%;
    cursor: pointer;
    text-decoration: none;
    border-radius: .5rem;
    margin-top: 1rem;
    font-size: 20px;
    padding: 1rem 3rem;
    background:  #505050;
    color: white;
    text-align: center;
}

.btns {
    width: 240px;
    height: 50px;
    cursor: pointer;
    border-radius: .5rem;
    margin-top: 2rem;
    margin-left: 200px;
    font-size: 20px;
    padding: .5rem 2rem;
    position: relative;
    left: 50px;
    background:  #505050;
    color: white;
    
    text-align: center;
}

.btn:hover {
    transform: translateY(-3px);
}
#img{
    width: 200px;
    height: 200px;
    
}
</style>
</head>

<body>
 

   <?php
    @include('Dashboard.php');
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<span class="message">' . $message . '</span>';
      }
   }

   ?>
     <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
         <button name="men" class="btns"> Men's Products</button>
         <button name="women" class="btns"> Women's Products</button>
         <button name="kids" class="btns"> Kids Products</button>
         
      </form>


      <?php
      $select = mysqli_query($conn, "SELECT * FROM product");
      if (isset($_POST['men'])) {
         $select = mysqli_query($conn, "SELECT * FROM product WHERE category='Mens_Ware'");
      };
      if (isset($_POST['women'])) {
         $select = mysqli_query($conn, "SELECT * FROM product WHERE category='Womens_Ware'");
      };
      if (isset($_POST['kids'])) {
         $select = mysqli_query($conn, "SELECT * FROM product WHERE category='Kids_Ware'");
      };
      

      ?>
      <!-- Product table -->
      <div class="products">
         <table class="tblproduct">
            <form method="POST">
            <thead>
               <tr>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Manage</th>
               </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
               <tr>
                  <td><img src="UploadImage/<?php echo $row['Image']; ?>" id="img" height="20px" alt=""></td>
                  <td><?php echo $row['Pr_Name']; ?></td>
                  <td>Rs.<?php echo $row['Price']; ?>/-</td>
                  <td>
                     <a href="update.php?edit=<?php echo $row['Pr_Id']; ?>" class="buttons"> <i class="fas fa-edit"></i> Update </a>
                     <a href="adminpage.php?del=<?php echo $row['Pr_Id']; ?>" class="buttons"> <i class="fas fa-trash"></i> Delete </a>
                  </td>
               </tr>
            <?php } ?>
         </table>
         </form>
      </div>

   </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>