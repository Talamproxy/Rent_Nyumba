<?php
    include('classes/DB.php');
    include('classes/Mail.php');

     if (isset($_POST['createaccount'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
         $confirmpassword = $_POST['confirmpassword'];
        $email = $_POST['email'];
         $phonenumber = $_POST['phonenumber'];
		 if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {
                                if($password==$confirmpassword){

									if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                     if (!DB::query('SELECT phonenumber FROM users WHERE phonenumber=:phonenumber', array(':phonenumber'=>$phonenumber))) {
     DB::query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'\',:phonenumber)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':phonenumber'=>$phonenumber));
                     $message = "Success. Welcome\\nTry again.";$cstrong = True;$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));$user_id = DB::query('SELECT id FROM users WHERE phonenumber=:phonenumber', array(':phonenumber'=>$phonenumber))[0]['id'];
                        DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
        $message = "SUCCESS!.Welcome to Talnet.\\nThank you";Mail::sendMail('Welcome to Talnet.ke!', 'Your account has been created! .Promote kenya ,Use kenyan', $email, $message);echo "<script> window.location.replace('https://www.rentnyumba.co.ke');</script>";
									}
                                     else {
                                        $message = "Phone number is in use!.\\nTry again.";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                }
                            }
							   else {
                                $message = "Email in use!.\\nTry again.";
                                 echo "<script type='text/javascript'>alert('$message');</script>";
                                }
									}else {
                                        $message = "Invalid email address!.\\nTry again.";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
									}
                                 } else {
                                    $message = "Passwords dont match!.\\nTry again.";
                                    echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        } else {
                            $message = "Invalid password!.\\nTry again.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        } else {
                            $message = "invalid username!.\\nTry again.";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                } else {
                     $message = "invalid username!.\\nTry again.";
                     echo "<script type='text/javascript'>alert('$message');</script>";
                }

        } else {
             $message = "Username already exists!.\\nTry again.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        } 
        }
				?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Talnet| Sign up</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form action="create-account.php" method="post" id="signup">
           
            <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
             <i><h2 style="margin-top: 0px; color:#3B6889; font-size: 20px; text-align: center;">Welcome!</h2></i>
             <h2 style="margin-top: 0px; color:black; font-size: 20px; text-align: center;">Create Account Here</h2>
            <div class="form-group">
                <input class="form-control" id="username" type="text" name="username" placeholder="Name" required>
                <font size="2px"> Eg. Wasafi Real Estate, Elite Residence </font>
            </div>
            <div class="form-group">
                <input class="form-control" id="email" type="email" name="email" placeholder="Email" required>
                <font size="2px"> Eg. realtors@gmail.com </font>
            </div>
             <div class="form-group">
                <input class="form-control" id="phonenumber" type="text" name="phonenumber" placeholder="Phone" required>
                <font size="2px"> Eg. 070012345</font>
            </div>
            <div class="form-group">
                <input class="form-control" style="width:140px;float:left;" id="password" type="password" name="password" placeholder="New Password" required>
            </div>
             <div class="form-group">
                <input class="form-control" style="width:100px;float:right;" id="password" type="password" name="confirmpassword" placeholder="Confirm" required>
            </div>
            <div class="form-group">
            	<input hidden type="button" id="post2" style="width:100%;background-image:url(&quot;none&quot;);background-color:#3B6889;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;   border-radius:4px; box-shadow:none;text-shadow:none;opacity:0.9;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"  >
             <input type="submit" class="btn btn-primary btn-block" data-bs-hover-animate="shake" id="post" name="createaccount" value="Create Account" style="background-color: #3B6889;">
            </div><a href="login.php" class="forgot">Already got an account? Click here!</a></form>
    </div>
 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       

$(document).ready(function() {
    
$(function() {
  $("#signup").submit(function(){

    $("#post")
      .hide();
       $("#post2")
      .val("Creating Account...").show();
     
     
    return true;
  });
   });
  });

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