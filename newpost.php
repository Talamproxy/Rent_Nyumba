<?php
include('./classes/DB.php');
include('./classes/login.php');
include('./classes/posts.php');
include('./classes/image.php');
$username = "";
$userid = "";     
$postid="";           
$loggedInUserId=Login::isLoggedIn();
if (isset($_GET['username'])) {
       if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))) {

                $username = DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['username'];
				$userid = DB::query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
				if(isset($_POST['post'])){

					if($_FILES['postimg2']['size']==0 AND $_FILES['postimg1']['size']==0 AND $_FILES['postimg']['size']==0)
					{

                     Post::createPost($_POST['postsize'], $_POST['posttown'], $_POST['postestate'], $_POST['plotname'], $_POST['postrent'], $_POST['postrentdescribe'], Login::isLoggedIn(), $userid) ;}


				else{
               $postid=Post::createImgPost($_POST['postsize'], $_POST['posttown'], $_POST['postestate'], $_POST['plotname'], $_POST['postrent'], $_POST['postrentdescribe'], Login::isLoggedIn(), $userid) ;
                    if(!$_FILES['postimg2']['size']==0){ 
                   
                     Image2::uploadImage2('postimg2', "UPDATE posts SET postimg2=:postimg2 WHERE id=:postid", array(':postid'=>$postid));}


						if(!$_FILES['postimg1']['size']==0){
							
							 Image1::uploadImage1('postimg1', "UPDATE posts SET postimg1=:postimg1 WHERE id=:postid", array(':postid'=>$postid));}

							if(!$_FILES['postimg']['size']==0){
								
								 Image::uploadImage('postimg', "UPDATE posts SET postimg=:postimg WHERE id=:postid", array(':postid'=>$postid));}



				
				}
				 
				}}
				$dbposts = DB::query('SELECT * FROM posts WHERE user_id=:userid ORDER BY id DESC', array(':userid'=>$userid));
				 $posts="";

					
					}
	   
	   else{
		   die('user not found');
	   }			

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talnet | New Post</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body >
    <div class="login-clean">
        <form action="posts.php?username=<?php echo $username; ?>" method="post" enctype="multipart/form-data" id="newpost">
             <div><i class=""></i><img src="assets/img/avatar.png" style="height: 140px; width:140px; margin-left:40px; " ></div> 
            <h2 style="margin-top: 0px; color:black; font-size: 20px; text-align: center;">Create a Post</h2>

            <div class="form-group">
            	<font size="2px"><text >Enter Town:</text></font>
                <input  class="form-control" type="text" name="posttown"  placeholder="Eg. eldoret" required>
            </div>
            	<font size="2px"><text>Enter Estate:</text></font>
            	
            <div class="form-group">
                <input  class="form-control" type="text" name="postestate"  placeholder="Eg. Langata" required>
            </div>
          <div class="form-group">
          <font size="2px"><text>Enter Residence:</text></font>
                <input  class="form-control" type="text" name="plotname"   placeholder="Eg. Elite courts" required>
            </div>
            <div class="form-group">
            	<font size="2px"><text >House size:</text></font>
            	
                <input  class="form-control" type="text" name="postsize"  placeholder="Eg. 1 bedroom" required>
            </div>
            <div class="form-group">
            	<font size="2px"><text >Rent Amount:</text></font>
                <input  class="form-control" type="text" name="postrent"  placeholder="eg. 5,000" required>
            </div>
            <div class="form-group">
            	<text>Description:</text>
                <input style="height:70px;" class="form-control" type="text" name="postrentdescribe"   placeholder="Description" required>
            </div>
             <div class="form-group">
            	<text>M-PESA:</text>
                <input style="height:70px;" class="form-control" type="text"   placeholder="M-pesa transaction code" required>
            </div>
            <font color="black"><text>Upload an image:(You can post upto 3 images)</text></font><br/>
            <input   type="file"  name="postimg" required><input  type="file" name="postimg1" ><input type="file"  name="postimg2" >
            <div class="form-group">
            	 <input hidden type="button" id="post2"style="width:100%;background-image:url(&quot;none&quot;);background-color:#3B6889;color:#fff;padding:16px 32px;margin:0px 0px 6px;border:none;   border-radius:4px; box-shadow:none;text-shadow:none;opacity:0.9;font-weight:bold;font-size:13px;letter-spacing:0.4px;line-height:1;outline:none;"  >
             <input type="submit" class="btn btn-primary btn-block" data-bs-hover-animate="shake" id="post1" name="post" value="Post" style="background-color: #3B6889;">
            </div></form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
 <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/bs-animation.js"></script> -->
    <script type="text/javascript">
       
$(document).ready(function() {
    
$(function() {
  $("#newpost").submit(function(){

    $("#post1")
      .hide();
       $("#post2")
      .val("Posting...").show();
      
     
 
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


