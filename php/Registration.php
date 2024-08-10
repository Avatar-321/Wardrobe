<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Register Form</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet"  href="Css/font.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="Css/reg.css?v=<?php echo time(); ?>">
<meta name="robots" content="noindex, follow"> 
<script>
         function displaySweetAlert() {
        swal(" JS Demo", "Hello Sweet Alert", "success");
        }
</script>

<!-- <script nonce="e7253765-6040-4cab-8f61-d41829469587">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document");</script> -->
</head>
<body class="form-v6">

<?php
$msg="";

if (isset($_POST['register'])) {
    if (isset($_POST['User']) && isset($_POST['Email']) &&
        isset($_POST['password']) && isset($_POST['password2']) ){
        
        
        $username = $_POST['User'];
        $user_id= $_POST['User_Id'];
        $password = $_POST['password'];
        $email = $_POST['Email'];
        $password2 = $_POST['password2'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "wardrobe";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        $Insert= "SELECT * from user_details where Email = '$email'";
        $result = mysqli_query($conn,$Insert);
        if(mysqli_num_rows($result)== 1){
          
          
          echo "<script>alert('User exsists');</script>";
          header('location:Registration.php');

        }else{

        
        $Insert = "INSERT INTO user_details values('$username', $user_id,'$email', '$password')";
        $run = mysqli_query($conn,$Insert) or die(mysqli_error($conn));
        if ($run) {
          //header('location:login1.php');
          echo "<script>alert('user Record Inserted');</script>";
          
        }
        else {
          echo "Form Not Submitted..!!";
           
        }
    }
  }
    else {
        echo "All field are required.";
        die();
    }
  }
// else {
//     echo "Submit button is not set";
// }

?>
  <div class="page-content">
    <div class="form-v6-content">
       <div class="form-left"><img src="Images/regimg.jpg" alt="form"></div>

    <form class="form-detail" action="#" method="post">
    <h2>Register Form</h2>
      <div class="form-row">
    <input type="text" name="User" id="full-name" class="input-text" placeholder="Your Name" required>
    </div>
    <div class="form-row">
    <input type="text" name="User_Id" id="userid" class="input-text" placeholder="Id" required>
    </div>
    <div class="form-row">
      <input type="text" name="Email" id="your-email" class="input-text" placeholder="Email Address" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
    </div>
    <div class="form-row">
      <input type="password" name="password" id="password" class="input-text" placeholder="Password" required>
    </div>
    <div class="form-row">
      <input type="password" name="password2" id="comfirm-password" class="input-text" placeholder="Comfirm Password" required>
    </div>
    <div class="form-row-last"><input type="submit" name="register" class="register" value="register"></div>
 </form>
  </div>
  </div>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('DBC', 'UA-23581568-13');
</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"73cd032ce8a01e89","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>