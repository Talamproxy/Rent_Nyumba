<?php
include('classes/DB.php');
include('classes/login.php');

if (isset($_POST['login'])) {
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];

        if (DB::query('SELECT phonenumber FROM users WHERE phonenumber=:phonenumber', array(':phonenumber'=>$phonenumber))) {

                if (password_verify($password, DB::query('SELECT password FROM users WHERE phonenumber=:phonenumber', array(':phonenumber'=>$phonenumber))[0]['password'])) {$cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM users WHERE phonenumber=:phonenumber', array(':phonenumber'=>$phonenumber))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));header("location: https://www.rentnyumba.co.ke/index.php");setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
echo 'Logged in!';  

                      


                } else {
                        $message = "Phone Number or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
                }

        } else {
                $message = "User not registered.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message');</script>";
        }

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talnet | Log In</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <div class="login-clean">
        <form action="login.php" id="login" method="post" >
             <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
            <h2 style="margin-top: 0px; color:black; font-size: 20px; text-align: center;">Log In Here</h2>
            <div class="form-group">
                <input class="form-control" type="text" name="phonenumber" id="phonenumber"  placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
            	 <input hidden type="button" id="login2"style="width:100%;background-image:url(&quot;none&quot;);background-color:#3B6889;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;   border-radius:4px; box-shadow:none;text-shadow:none;opacity:0.9;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"  >
             <input type="submit" class="btn btn-primary btn-block" data-bs-hover-animate="shake" id="login1" name="login" value="Log In" style="background-color: #3B6889;">
            </div><a href="forgot-password.php" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>


    

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
       
$(document).ready(function() {
    
$(function() {
  $("#login").submit(function(){

    $("#login1")
      .hide();
       $("#login2")
      .val("Logging In...").show();
      
     
 
    return true;
  });
   });
  });

    </script>
</body>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ba22983c9abba579677b19e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
  <script src="assets/js/jquery.min.js"></script>

</html>























