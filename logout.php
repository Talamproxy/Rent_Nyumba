<?php
include('./classes/DB.php');
include('./classes/login.php');

if (!Login::isLoggedIn()) {
        die("Not logged in.");
}

if (isset($_POST['confirm'])) {

        if (isset($_POST['alldevices'])) {

                DB::query('DELETE FROM login_tokens WHERE user_id=:userid', array(':userid'=>Login::isLoggedIn()));

                                                 header("Location: index.php");

        } else {
                if (isset($_COOKIE['SNID'])) {
                        DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                        
                                                 header("Location: index.php");
                }
                setcookie('SNID', '1', time()-3600);
                setcookie('SNID_', '1', time()-3600);
        }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talnet | Log Out</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <div class="login-clean"> 
    	<form action="logout.php" method="post" id="logout">
             <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
           <font color="black" size="5px"> Log Out of your Account</font>
       
        <p>Are you sure you'd like to logout?</p><font color="black" size="2">

            <div class="form-group">
            	 <input hidden type="button" id="login2"style="width:100%;background-image:url(&quot;none&quot;);background-color:#3B6889;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;   border-radius:4px; box-shadow:none;text-shadow:none;opacity:0.9;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"  >
             <input type="submit" class="btn btn-primary btn-block" data-bs-hover-animate="shake" id="login1" name="confirm" value="Confirm" style="background-color: #3B6889;">
            </div>
 <text>Logout of all devices?<input type="checkbox" name="alldevices" value="alldevices"><br />
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>


    

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
       
$(document).ready(function() {
    
$(function() {
  $("#logout").submit(function(){

    $("#login1")
      .hide();
       $("#login2")
      .val("Logging Out...").show();
      
     
 
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



