<?php

@include 'DBC.php';
$id = $_GET['edit'];
if(isset($_POST['update_product'])){
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_des = $_POST['product_des'];
   $product_qty = $_POST['product_qty'];
   $product_cat= $_POST['product_cat'];

   $product_image1 = $_FILES['product_image1']['name'];
   $product_image_tmp_name1 = $_FILES['product_image1']['tmp_name'];
   //$product_image_folder1 = 'UploadImage/'.$product_image1;
   {
      $update_data = "UPDATE product SET Pr_Name='$product_name', Price='$product_price', Qt='$product_qty',category='$product_cat', Discrip='$product_des', Image='$product_image1'   WHERE Pr_Id = '$id'";
      $upload = mysqli_query($conn, $update_data);
      // echo $update_data;
      // move_uploaded_file($product_image_tmp_name1, $product_image_folder1);
      if($upload){
         move_uploaded_file($_FILES['product_image1']['tmp_name'],'UploadImage/'.$product_image1);
         $message[] = 'Succsessfully updated!';
         
         //header('location:adminpage.php');
      }else{
         $message[] = 'Something went Wrong!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Update</title>
   <link rel="stylesheet" href="Admin.css">
   <style>
      body{
         background: linear-gradient(-20deg, #2b5876 0%, #4e4376 100%);
      }
   </style>
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="formContainer centered">

   <?php
       @include('Dashboard.php');
      $select = mysqli_query($conn, "SELECT * FROM product WHERE Pr_Id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['Pr_Name']; ?>" placeholder="enter the product name">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['Price']; ?>" placeholder="enter the product price">
      <input type="text" class="box" name="product_des" value="<?php echo $row['Discrip']; ?>" placeholder="enter the product Description">
      <input type="number" class="box" name="product_qty" value="<?php echo $row['Qt']; ?>" placeholder="enter the product Quantity">
      <select name="product_cat" class="input-box box" class="product_cat">
               <option value="Mens_Ware">Men's Ware</option>
               <option value="Womens_Ware"> Women's Ware</option>
               <option value="Kids_Ware">Kid's Ware</option>
               
            </select>
      <input type="file" class="box" name="product_image1"  accept="image/png, image/jpeg, image/jpg, image/jfif, image/webp" value="<?php echo $row['Image']; ?>">
      
      <input type="submit" value="update product" name="update_product" class="btns">
      <a href="adminpage.php" class="btns">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>