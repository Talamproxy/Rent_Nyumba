<?php
include('./classes/DB.php');
include('./classes/login.php');
$tokenIsValid = False;
if (Login::isLoggedIn()) {

        if (isset($_POST['changepassword'])) {

                $oldpassword = $_POST['oldpassword'];
                $newpassword = $_POST['newpassword'];
                $newpasswordrepeat = $_POST['newpasswordrepeat'];
                $userid = Login::isLoggedIn();

                if (password_verify($oldpassword, DB::query('SELECT password FROM users WHERE id=:userid', array(':userid'=>$userid))[0]['password'])) {

                        if ($newpassword == $newpasswordrepeat) {

                                if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {

                                        DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));

                                          $message = "Password changed successfully!.\\n";
                                        echo "<script type='text/javascript'>alert('$message');</script>"; echo "<script> window.location.replace('https://www.rentnyumba.co.ke');</script>";


                                }

                        } else { 

                          $message = "Passwords don\'t match!.\\n Try again";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                        }

                } else {


                          $message = "Incorrect old password!.\\n Try again";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                
                }

        }

} else {
        if (isset($_GET['token'])) {
         $token = $_GET['token'];
        if (DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))) {
                $userid = DB::query('SELECT user_id FROM password_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];
                $tokenIsValid = True;
                if (isset($_POST['changepassword'])) {

                        $newpassword = $_POST['newpassword'];
                        $newpasswordrepeat = $_POST['newpasswordrepeat'];

                                if ($newpassword == $newpasswordrepeat) {

                                        if (strlen($newpassword) >= 6 && strlen($newpassword) <= 60) {

                                                DB::query('UPDATE users SET password=:newpassword WHERE id=:userid', array(':newpassword'=>password_hash($newpassword, PASSWORD_BCRYPT), ':userid'=>$userid));


                                                $message = "Password changed successfully!.\\n";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                                DB::query('DELETE FROM password_tokens WHERE user_id=:userid', array(':userid'=>$userid));
                                        }

                                } else {
                                         $message = "Passwords don\'t match!.\\n Try again";
                                        echo "<script type='text/javascript'>alert('$message');</script>";
                                }

                        }


        } else {
                die('Token invalid');
        }
} else {
        die('Not logged in');
}
}
?>


 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talnet | Change Password</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <div class="login-clean">
     <form action="<?php if (!$tokenIsValid) { echo 'change-password.php'; } else { echo 'change-password.php?token='.$token.''; } ?>" id="changepassword" method="post">
      <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
      <h2 style="margin-top: 0px; color:black; font-size: 20px; text-align: center;">Change Password</h2>
        <?php if (!$tokenIsValid) { echo '<div class="form-group"><input class="form-control" type="password" name="oldpassword" value="" placeholder="Enter Current Password "  required><p /></div>'; } ?>
        <div class="form-group">
        <input class="form-control" type="password" name="newpassword" value="" placeholder="Enter New Password " required><p />
      </div>
        <div class="form-group">
        <input class="form-control" type="password" name="newpasswordrepeat" value="" placeholder="Repeat New Password "  required><p />
      </div>


 <div class="form-group">
               <input hidden type="button" id="post2"style="width:100%;background-image:url(&quot;none&quot;);background-color:#3B6889;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;   border-radius:4px; box-shadow:none;text-shadow:none;opacity:0.9;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"  >
             <input type="submit" class="btn btn-primary btn-block" data-bs-hover-animate="shake" id="post1" name="changepassword" value="Change Password" style="background-color: #3B6889;">
            </div>
        </form>
</div>

 <script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">


$(document).ready(function() {
  
$(function() {
  $("#changepassword").submit(function(){

    $("#post1")
      .hide();
       $("#post2")
      .val("Updating password...").show();
    
     
 
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
