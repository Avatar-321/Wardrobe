<?php
@include 'DBC.php';
// Product insert
if (isset($_POST['add_product'])) {

   $product_name = $_POST['product_name'];
   $product_Id = $_POST['product_id'];
   $product_price = $_POST['product_price'];
   $product_des = $_POST['product_des'];
   $product_qty = $_POST['product_qty'];
   $product_cat = $_POST['product_cat'];
   $product_image1 = $_FILES['product_image1']['name'];
   $product_image_tmp_name1 = $_FILES['product_image1']['tmp_name'];
   
  if (empty($product_name) || empty($product_Id) || empty($product_price) || 
  empty($product_des) || empty($product_qty) || empty($product_cat) || empty($product_image1)) {
      $message[] = 'please fill out all';
   } else {
      $insert = "INSERT INTO product (Pr_Id, Pr_Name,Price, Qt,category, Image ,Discrip)
       VALUES('$product_Id','$product_name', '$product_price','$product_qty','$product_cat',
       '$product_image1','$product_des')";
      $upload = mysqli_query($conn, $insert);
      if ($upload) {
         // move_uploaded_file($product_image_tmp_name1, $product_image_folder1);
         move_uploaded_file($_FILES['product_image1']['tmp_name'],'UploadImage/'.$product_image1);
        
         $message[] = 'new product added successfully';
      } else {
         $message[] = 'could not add the product';
      }
   }
};

// // Delete option
// if (isset($_GET['del'])) {
//    $id = $_GET['del'];
//    mysqli_query($conn, "DELETE FROM product  WHERE Pr_Id = $id");
//    mysqli_query($conn, "ALTER TABLE product AUTO_INCREMENT = 1");
   
//    header('location:adminpage.php');
// };
// if (isset($_POST['goHome'])) {
//    @include('logout.php');
// }

// ?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="Admin.css">
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

   <div class="container">
<div class="formContainer">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Add new product</h3>
            <label class="lbl">Product Name</label><input type="text"  name="product_name" class="box">
            <label class="lbl">Product Id</label><input type="text"  name="product_id" class="box">
            <label class="lbl">Product Price</label><input type="number"  name="product_price" class="box">
            <label class="lbl">Description</label><input type="text"  name="product_des" class="box">
            <label class="lbl">Product Quantity</label><input type="number"  name="product_qty" class="box">
            <label class="lbl">Product category</label><select  class="box" name="product_cat" >
               <option value="Mens_Ware" >Men's Ware</option>
               <option value="Womens_Ware" > Women's Ware</option>
               <option value="Kids_Ware">Kid's Ware</option>
              
            </select>
            <input type="file" accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" name="product_image1" class="box">
            
            <input type="submit" class="buttons " name="add_product" value="add product">
            <a href="MainPage.php" class="buttons" name="goHome">Go to Home page</a>

         </form>

      </div>
     
      </div>

   </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>