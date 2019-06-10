<?php
include('./classes/DB.php');
include('./classes/Login.php');

if (Login::isLoggedIn()) {
	 $loggedInUserId=Login::isLoggedIn();
     $username = DB::query('SELECT username FROM users WHERE id=:loggedInUserId',array(':loggedInUserId'=>$loggedInUserId))[0]['username'];
     header("location: newpost.php?username=$username");
      }else{
     }
?>









<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Talnet| Notice</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <div class="login-clean"> 
        <form >
             <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
           <font color="black" size="5px"> Notice!</font>
       
         <p>You have to be logged in to post!</p>
        <a href="create-account.php">create account here?</a>
         <p>Already have an account!</p><font color="blue">
        <a href="login.php">login here?</a>
       
    </div>
    <script src="assets/js/jquery.min.js"></script>


    

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->

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