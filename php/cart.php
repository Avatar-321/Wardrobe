
<!DOCTYPE html>

<?php
session_start();
include('DBC.php');

if (!isset($_SESSION['User'])) {
 header("Location: Login1.php");
}

$user_id =  $_SESSION['User_ID'];




?>

<html>

<head>
  <title>Product Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Css/buy.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <style>
    .tbl{
      background: linear-gradient(to right, #5d4157, #a8caba);
      color: white;
      text-align: center;
    }
    body{
      background:linear-gradient(to right, #525252, #3d72b4);
    }
    .modal-dialog{
      padding top: 100px;
    }
    .checkoutform{
      background:linear-gradient(to right, #fc00ff, #00dbde);
    }

   
    
  </style>
  </head>
<?php
if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
  mysqli_query($conn, "ALTER TABLE cart AUTO_INCREMENT = 1");
  header('location:cart.php');
};
?>

<body>
  <?php 
  @include('DBC.php') ?>
  <div class="container-fluid">
    <div class="row" style="margin-top: 40px;">
      <div class="col-md-12" align="center">
        <h3>Product Cart</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead class="tbl">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">QTY</th>
              <th scope="col">Total (LKR)</th>
              <th scope="col">Remove</th>
            </tr>

          </thead>
          <t body>
            <?php
            $cartTotal = 0;
            $products = array();
            $sql = "SELECT * FROM cart LEFT JOIN product ON cart.Pr_Id=product.Pr_Id WHERE User_id=$user_id";
            if ($result = mysqli_query($conn, $sql)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  $cartTotal += $row['qty'] * $row['Price'];

                  echo "<form method =POST>";
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td scope='row'> <img src=UploadImage/" . $row['Image'] . " width='50'></td>";
                  echo "<td>" . $row['Pr_Name'] . "</td>";
                  echo "<td>" . $row['Price'] . "</td>";
                  echo "<td>" . $row['qty'] . "</td>";
                  echo "<td>" . $row['qty'] * $row['Price'] . "</td>";
                  echo "<td><a href='cart.php?remove=$row[id]' class='btn btn-danger
                   btn-sm' name='remove'>Remove</a></td>";
                  echo "</tr>";
                  echo "</form>";
                }
              } else {
                echo "";
              }
            } else {
              echo "Cart is empty";
            }
            ?>
            <tr>
              <th scope="row"></th>
              <td colspan="3">TOTAL (LKR)</td>
              <td><?php echo $cartTotal; ?></td>
              <td></td>
          </tr>
            <tr>
            <th scope="row"></th>
            <td colspan="6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
            Proceed To Pay
             </button>
              </td>
            </tr>
          </t body>
         </table>
         <a href="MainPage.php"><button type="button" class="btn btn-primary"> Home</button></a>
      </div>
      
      <div class="col-md-2"></div>
      
    </div>
  </div>
  <div class="modal" tabindex="-1" id="modal">
  <div class="modal-dialog ">
    <div class="modal-content">
      
      <div class="modal-body">
      <form method="POST">
  <div class="checkoutform">
    <div class="card_number" id="card-container">
      <input type="text" class="input" id="card" name="crd" placeholder="0000 0000 0000 0000">
    </div>
    <div class="card_grp">
      <div class="exdate">
        <input type="text" name="exday1" class="exday" placeholder="00">
        <input type="text" name="exday2" class="exday" placeholder="00">
      </div>
      <div class="cvv">
        <input type="text" class="cvv_input" name="cno" placeholder="000">
      </div>
    </div>
    <div >
    <button class="btnPay"  name="proceed"><a href="./buy.php">pay</a></button>
    </div>
    <div class="mt-1">
      Cash On Delivery <a href="./buy.php">Click Here</a>
    </div>
  </div>
  </form>
  <?php
    if (isset($_POST['proceed'])) {
      @include('DBC.php');
      $crdno=$_POST['crd'];
      $crdday1=$_POST['exday1'];
      $crdday2=$_POST['exday2'];
      $cvv=$_POST['cno'];
      $message="Please fill all the information or check the data again";
      //to cal the number count = strlen
      if(strlen($crdno)==2 && strlen($crdday1)==2 && strlen($crdday2)==2 && strlen($cvv)==3){
        mysqli_query($conn, "INSERT INTO order_tb (User_ID,Pr_ID,Qt) SELECT  User_id, Pr_Id , qty FROM cart");
        mysqli_query($conn, "ALTER TABLE order_tb AUTO_INCREMENT = 1");
        mysqli_query($conn, "DELETE From cart");
        echo "<script>window.location = './thanks.php';</script>";
      }else{
        echo '<span class="message">' . $message . '</span>';
      }
    };
  ?>
  <script>
    function thanks() {
    alert("Please fill all the information");

    }
  </script>
      
  </div>
</div>
  
  




  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>