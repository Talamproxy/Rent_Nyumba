
 <?php
include('./classes/DB.php');
include('./classes/login.php');
include('./classes/posts.php');
$username = "";
$userid = "";     
$postid="";        

if (Login::isLoggedIn()) {
    $loggedInUserId=Login::isLoggedIn();
    $username = DB::query('SELECT username FROM users WHERE id=:loggedInUserId', array(':loggedInUserId'=>$loggedInUserId))[0]['username'];
}

  ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <title >Talnet| Contact</title> <link href="assets/img/avatar.png" rel="shortcut icon" sizes="250x250"> 
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body>
     <header class="hidden-sm hidden-md hidden-lg" style="background-color: #3B6889;">
        <div class="searchbox">
                <h1 class="text-left"> Talnet<font style="font-size:19px;">.ke</font></h1>
<div class="searchbox">
<a href="index.php"><font color="white"> HOME |</font></a>
         <?php if (Login::isLoggedIn()) { echo '<a href="posts.php?username='; echo $username; echo '"> <font style="text-transform:uppercase;" color="white">'; echo $username; echo ' |</font></a>';} else{echo' <a href="create-account.php"><font color="white">JOIN |</font></a>';}?> 
         <a href="about-us.php"><font color="white">ABOUT US </font></a> 
                </div>
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button">MENU <span class="caret"></span></button>
                     <ul class="dropdown-menu dropdown-menu-right" role="menu">
                       <?php if (Login::isLoggedIn()) {echo '';} else { echo '<li role="presentation"><a href="index.php">Home</a></li>';}?>
                                <li class="divider" role="presentation"></li>
                                <?php if (Login::isLoggedIn()) { echo '<li role="presentation"><a href="index.php">Home</a></li>'; echo ' <li role="presentation"><a href="about-us.php">About Us </a></li><li role="presentation"><a href="contact-us.php">Contact Us</a></li>'; echo ' <li role="presentation"><a href="change-password.php">Change Password </a></li>';  echo ' <li role="presentation"><a href="logout.php">Log Out </a></li>';} else { echo ' <li role="presentation"><a href="about-us.php">About Us </a></li><li role="presentation"><a href="contact-us.php">Contact Us</a></li>'; echo '<li role="presentation"><a href="login.php">Log In</a></li>'; echo '<li role="presentation"><a href="create-account.php">Sign Up</a></li>';}?>
                    </ul>
                </div>
            </form>
        </div>
        <hr>
    </header>
    <div>
        <nav class="navbar navbar-default hidden-xs navigation-clean">
            <div class="container">
                <div class="navbar-header"><a href="index.php"><img src="assets/img/avatar.png" class="avatar" style="height: 80px;"></a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                     <font color="black"><div style="text-align:center"><h1>    <b><font size="25px">Talnet</font><font style="font-size:19px;">.ke</font></font></div>
                    <ul class="nav navbar-nav hidden-md hidden-lg navbar-right">
                        <li  role="presentation"><a href="index.php">Home</a></li>
                        <li class="dropdown open"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <?php if (Login::isLoggedIn()) {echo '';} else { echo '<li role="presentation"><a href="index.php">Home</a></li>';}?>
                                <li class="divider" role="presentation"></li>
                                <?php if (Login::isLoggedIn()) { echo '<li role="presentation"><a href="index.php">Home</a></li>'; echo ' <li role="presentation"><a href="about-us.php">About Us </a></li><li role="presentation"><a href="contact-us.php">Contact Us</a></li>'; echo ' ';  echo ' <li role="presentation"><a href="logout.php">Log Out </a></li>';} else { echo ' <li role="presentation"><a href="about-us.php">About Us </a></li><li role="presentation"><a href="contact-us.php">Contact Us</a></li>'; echo '<li role="presentation"><a href="login.php">Log In</a></li>'; echo '<li role="presentation"><a href="create-account.php">Sign Up</a></li>';}?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right">
                        <li  role="presentation"><a href="index.php">Home</a></li>
                       <?php if (Login::isLoggedIn()) { echo '';echo '<li role="presentation"><a href="noticelogin.php">NEW POST</a></li>'; } else { echo '<li role="presentation"><a href="login.php">LOGIN</a></li>'; echo '<li role="presentation"><a href="create-account.php">SIGN UP</a></li>';}?>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">User <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <?php if (Login::isLoggedIn()) {echo '';} else { echo '<li role="presentation"><a href="index.php">Home</a></li>';}?>
                                <li class="divider" role="presentation"></li>
                                <?php if (Login::isLoggedIn()) { echo '<li role="presentation"><a href="index.php">Home</a></li>'; echo ' <li role="presentation"><a href="about-us.php">About Us </a></li><li role="presentation"><a href="contact-us.php">Contact Us</a></li>'; echo ' ';  echo ' <li role="presentation"><a href="logout.php">Log Out </a></li>';} else { echo ' <li role="presentation"><a href="about-us.php">About Us </a></li>'; echo '<li role="presentation"><a href="login.php">Log In</a></li>'; echo '<li role="presentation"><a href="create-account.php">Sign Up</a></li>';}?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h1>Contact Us</h1></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   
                      <li class="list-group-item"><span><strong>Talnet.ke</strong></span>
                            <p>Welcome to Talnet.ke follow us on Facebook <a href="https://www.facebook.com/rentnyumbaKE">www.facebook.com/rentnyumbaKE</a></p> 
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
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                            <div class="timelineposts">
<blockquote><font size=2px><b>E-MAIL</b></br>
<font color="grey">info@rentnyumba.co.ke</font></font></br>
<font color="grey">Kiptalambrian3@gmail.com</font></font>


</blockquote>
<blockquote><font size=2px><b>PHONE NUMBER</b></br>
<font color="grey">+254703644103</br>+254777644103</font></font></br>


</blockquote>
                            </div>
                    </ul>
                </div>
                <div class="col-md-3">

                     <ul class="list-group">
                    <ul class="list-group"></ul>
                  
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
               <p class="copyright">Talnet.CO.KE© 2018</p>
                 <p class="copyright">Powered by tru developers</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script type="text/javascript">
    </script>
</body>

</html>
