<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <style>
  <?php include "Css/stylelg.css" ?>
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <link rel="stylesheet" href="Css/stylelg.css?v=<?php echo time(); ?>">
  <link rel="stylesheet"  href="Css/font.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body onload="getcookiedata()">
  <?php

$msg="";
include 'DBC.php';
session_start();

error_reporting(0);

if (isset($_SESSION['User'])) {
  header('location:MainPage.php');
}

if(isset($_POST['btnSignIn'])){
  $email = $_POST['email'];
  $pass = $_POST['Pass'];
  echo $email;
  echo $pass;

  $email = trim($email);
  $pass = trim($pass);    
  // $host = "localhost";
  // $dbUsername = "root";
  // $dbPassword = "";
  // $dbName = "wardrobe";

  // $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

  if($conn->connect_error){
    die("Failed Connection :".$conn->connect_error);
    
  }else{
    $stmt = $conn->prepare("select * from user_details where Email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
   
		
    $stmt_result = $stmt->get_result();
    $num = $stmt_result->num_rows;
    echo $num;
    if ( $num> 0) {
      $data = $stmt_result->fetch_assoc();
      $_SESSION['User'] = $data['User'];
      $_SESSION['User_ID'] = $data['User_ID'];
      if($data['Password'] === $pass){
      header("Location: MainPage.php");
      echo $data['User_ID'];
      echo "test" ;
      }else{
        echo "Invalid Email or Password..!!";
      
      }
      
    }else{
      echo "Invalid Email or Password..!!";
    } 
   
  }
}
    
?>

  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"><img src="Images/Cloths/Lg3.jpg"></div>
          <div class="card-body">
          <h4 class="title text-center mt-4">
            Login into account
          </h4>
          <form action="Login1.php" class="form-box px-3" method="post" >
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="email" id ="Email" placeholder="Email Address" tabindex="10" required autocomplete="on">
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="Pass" placeholder="Password" required id="pw" autocomplete="on">
              <span class="eye" onclick="hide()" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16" id="hide1">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16" id="hide2">
  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
</svg></span>
            </div>

            <div class="mb-3 ">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" name="rememberme" onclick="setcookie()">
                <label class="custom-control-label" for="cb1">Remember me</label>
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" class="btn btn-block text-uppercase" name="btnSignIn">
                Login
              </button>
            </div>

            <div class="text-right">
              <a href="#" class="forget-link">
                Forget Password?
              </a>
            </div>

            <div class="text-center mb-3">
              or login with
            </div>

            <div class="row mb-3">
              <div class="col-4">
                <a href="#" class="btn btn-block btn-social btn-facebook">facebook</a>
              </div>

              <div class="col-4">
                <a href="#" class="btn btn-block btn-social btn-google"> google </a>
              </div>

              <div class="col-4">
                <a href="#" class="btn btn-block btn-social btn-twitter">twitter</a>
              </div>
            </div>

            <hr class="my-4">

            <div class="text-center mb-2">
              Don't have an account?
              <a href="Registration.php" class="register-link">
                Register here
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
     function hide(){
      var x = documnet.getElementByID("pw");
      var y = documnet.getElementByID("hide1");
      var z = documnet.getElementByID("hide2");

      if(x.type === "password"){
        x.type === "text";
        y.type === "block";
        z.type === "none"
      }
      else{
        x.type === "password";
        y.type === "none";
        z.type === "block"

      }
     }

     function setcookie(){
      var e = document.getElementById('Email').value;
      var p = document.getElementById('pw').value;

       document.cookie="Email="+e+";path=http://localhost:81/Assignment/";
       document.cookie="Password="+p+";path=http://localhost:81/Assignment/";
     } 

     function getcookiedata(){
      console.log(document.cookie);

      var email= getcookie("Email");
      var pswd= getcookie("Password");

      document.getElementById('Email').value = email;
      document.getElementById('pw').value= pswd;


     }
     function getcookie(cname){
      var name = cname + "=";
      var decode = decodeURIComponent(document.cookie);
      var ca = decode.split(;);
      for(var i =0; i<ca.lenghth; i++){
        var c = ca[i];
        while(c.charAt(0) == '');{
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0){
          return c.substring(name.length, c.length);
        }

      }
      return "";
     }

  </script>

</body>
</html>