<?php
include('./classes/DB.php');
include('./classes/Mail.php');

if (isset($_POST['resetpassword'])) { 
      $email = $_POST['email'];
      if (DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
        $cstrong = True;
        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
       
        $message = "Email sent ,Check your messages for reset link!\\n";
        $user_id = DB::query('SELECT id FROM users WHERE email=:email', array(':email'=>$email))[0]['id'];
        DB::query('INSERT INTO password_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
       Mail::sendMail('Forgot Password!, follow the link below to reset password', "<a href='https://www.rentnyumba.co.ke/change-password.php?token=$token'>https://www.rentnyumba.co.ke/change-password.php?token=$token</a>", $email, $message);

     }else{


       $message = "The E-mail was not found!.\\n Check it and Try again.";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
     }
}


?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Talnet| Forgot Password</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <div class="login-clean">
        <form action="forgot-password.php" id="sendemail" method="post" >
             <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
            <h2 style="margin-top: 0px; color:black; font-size: 20px; text-align: center;">Forgot Password?</h2>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Enter Email Address" required>
            </div>
          <div class="form-group">
               <input hidden type="button" id="login2"style="width:100%;background-image:url(&quot;none&quot;);background-color:#3B6889;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;   border-radius:4px; box-shadow:none;text-shadow:none;opacity:0.9;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"  >
             <input type="submit" class="btn btn-primary btn-block" data-bs-hover-animate="shake" id="login1" name="resetpassword" value="Send Email" style="background-color: #3B6889;">
            </div>
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
      .val("Sending Email...").show();
      
     
 
    return true;
  });
   });
  });

    </script>

</script>
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
</body>
</html>
