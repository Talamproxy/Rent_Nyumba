<?php
require_once("Db.php");

$db = new DB("127.0.0.1", "3306", "root", "root", "root");

if ($_SERVER['REQUEST_METHOD'] == "GET") {

        if ($_GET['url'] == "auth") {

         } else if ($_GET['url'] == "search") {
  $start = (int)$_GET['start'];

$town= $_GET['town'];
$estate=$_GET['estate'];
 if ($db->query('SELECT town FROM posts WHERE town=:town', array(':town'=>$town))) {
  if($db->query('SELECT estate, town FROM posts WHERE estate=:estate AND town=:town', array(':estate'=>$estate, ':town'=>$town))OR $estate=="")  {

if ($estate==""){
    $timeline=$db->query('SELECT posts.id, posts.size, posts.town, posts.estate, posts.plotname, posts.rent, posts.plotname, posts.rent_decribe, posts.posted_at, posts.postimg, posts.postimg1, posts.postimg2, users.username, users.phonenumber FROM users, posts WHERE users.id = posts.user_id AND posts.town = :town  ORDER BY posts.posted_at DESC  LIMIT 5 OFFSET '.$start.';', array(':town'=>$town));
}else{
    $timeline=$db->query('SELECT posts.id, posts.size, posts.town, posts.estate, posts.plotname, posts.rent, posts.plotname, posts.rent_decribe, posts.posted_at, posts.postimg, posts.postimg1,   users.username, users.phonenumber FROM users, posts WHERE users.id = posts.user_id AND posts.town = :town AND posts.estate=:estate  ORDER BY posts.posted_at DESC  LIMIT 5 OFFSET '.$start.';', array(':town'=>$town, ':estate'=>$estate));
}




     $response="[";

 foreach($timeline as $p)
                  { 
    $response .= "{";
       $response .= '"PostId": '.$p['id'].',';
       $response .= '"Postedby": "'.$p['username'].'",';
        $response .= '"PhoneNumber": "'.$p['phonenumber'].'",';
        $response .= '"PlotSize": "'.$p['size'].'",';
         $response .= '"Residence": "'.$p['plotname'].'",';
        $response .= '"Town": "'.$p['town'].'",';
        $response .= '"Estate": "'.$p['estate'].'",';
        $response .= '"PlotName": "'.$p['plotname'].'",';
        $response .= '"Rentamount": "'.$p['rent'].'",';
          $response .= '"PostImage": "'.$p['postimg'].'",';
           $response .= '"PostImage1": "'.$p['postimg1'].'",';
            $response .= '"PostImage2": "'.$p['postimg2'].'",';
        $response .= '"describe": "'.$p['rent_decribe'].'",';
        $response .= '"PostedAt": "'.$p['posted_at'].'"';
     $response .= "},";
                            }
                         $response = substr($response, 0, strlen($response)-1);   
                            $response .= "]"; 
                             http_response_code(200);
                            echo $response;
}else{

 $response="[";

    $response .= "{";
       $response .= '"PostId":"07723232303" ,';
       $response .= '"Postedby": "null estate",';
        $response .= '"PhoneNumber": "",';
        $response .= '"PlotSize": "",';
         $response .= '"Residence": "",';
        $response .= '"Town": "",';
        $response .= '"Estate": "",';
        $response .= '"PlotName": "",';
        $response .= '"Rentamount": "",';
          $response .= '"PostImage": "",';
           $response .= '"PostImage1": "",';
            $response .= '"PostImage2": "",';
        $response .= '"describe": "",';
        $response .= '"PostedAt": ""';
     $response .= "";   
                            $response .= "]"; 
                             http_response_code(200);
                            echo $response;



    }

    }else{

 $response="[";

    $response .= "{";
       $response .= '"PostId":"02432323" ,';
       $response .= '"Postedby": "",';
        $response .= '"PhoneNumber": "",';
        $response .= '"PlotSize": "",';
         $response .= '"Residence": "",';
        $response .= '"Town": "",';
        $response .= '"Estate": "",';
        $response .= '"PlotName": "",';
        $response .= '"Rentamount": "",';
          $response .= '"PostImage": "",';
        $response .= '"describe": "",';
        $response .= '"PostedAt": ""';
     $response .= "}";   
                            $response .= "]"; 
                             http_response_code(200);
                            echo $response;



    }
    
//if (isset($_POST['comment'])) {
  //  Comment::createComment($_POST['commentbody'], $_GET['postid'], $userid );
//}
             


        } else if ($_GET['url'] == "users") {
            
             } else if ($_GET['url'] == "imagemodal" && isset($_GET['postid'])) {
                $output = "";
                $images = $db->query('SELECT posts.postimg, posts.postimg1, posts.postimg2,  posts.id FROM posts WHERE posts.id = :postid ', array(':postid'=>$_GET['postid']));
                $output .= "[";
                foreach($images as $image) {
                        $output .= "{";
                        $output .= '"image1": "'.$image['postimg'].'",';
                        $output .= '"image2": "'.$image['postimg1'].'",';
                        $output .= '"image3": "'.$image['postimg2'].'"';
                        
                        $output .= "},";
                        //echo $comment['comment']." ~ ".$comment['username']."<hr />";
                }
                $output = substr($output, 0, strlen($output)-1);
                $output .= "]";
                echo $output;

        } else if ($_GET['url'] == "posts") { 
                      $start = (int)$_GET['start'];
                 $timeline=$db->query('SELECT posts.id, posts.size, posts.town, posts.estate, posts.plotname, posts.rent, posts.plotname, posts.rent_decribe, posts.posted_at, posts.postimg, users.username, users.phonenumber FROM users, posts WHERE users.id = posts.user_id  ORDER BY posts.posted_at DESC  LIMIT 5 OFFSET '.$start.';');
    
    
//if (isset($_POST['comment'])) {
  //  Comment::createComment($_POST['commentbody'], $_GET['postid'], $userid );
//}
                $response="[";

 foreach($timeline as $p)
                  { 
    $response .= "{";
       $response .= '"PostId": '.$p['id'].',';
       $response .= '"Postedby": "'.$p['username'].'",';
        $response .= '"PhoneNumber": "'.$p['phonenumber'].'",';
        $response .= '"PlotSize": "'.$p['size'].'",';
         $response .= '"Residence": "'.$p['plotname'].'",';
        $response .= '"Town": "'.$p['town'].'",';
        $response .= '"Estate": "'.$p['estate'].'",';
        $response .= '"PlotName": "'.$p['plotname'].'",';
        $response .= '"Rentamount": "'.$p['rent'].'",';
          $response .= '"PostImage": "'.$p['postimg'].'",';
        $response .= '"describe": "'.$p['rent_decribe'].'",';
        $response .= '"PostedAt": "'.$p['posted_at'].'"';
     $response .= "},";
                            }
                         $response = substr($response, 0, strlen($response)-1);   
                            $response .= "]"; 
                             http_response_code(200);
                            echo $response;


        } else if ($_GET['url'] == "profilepostsusers") { 

                $start = (int)$_GET['start'];
                $userid = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
                $timeline=$db->query('SELECT posts.id, posts.size, posts.town, posts.estate, posts.plotname, posts.rent, posts.rent_decribe, posts.posted_at, posts.postimg, users.username, users.phonenumber FROM users, posts WHERE users.id = posts.user_id AND users.id= :userid  ORDER BY posts.posted_at DESC  LIMIT 5 OFFSET '.$start.';', array(':userid'=>$userid));
    
//if (isset($_POST['comment'])) {
  //  Comment::createComment($_POST['commentbody'], $_GET['postid'], $userid );
//}
                $response="[";

 foreach($timeline as $p)
                  { 
    $response .= "{";
       $response .= '"PostId": '.$p['id'].',';
       $response .= '"Postedby": "'.$p['username'].'",';
        $response .= '"PhoneNumber": "'.$p['phonenumber'].'",';
        $response .= '"PlotSize": "'.$p['size'].'",';
         $response .= '"Residence": "'.$p['plotname'].'",';
        $response .= '"Town": "'.$p['town'].'",';
        $response .= '"Estate": "'.$p['estate'].'",';
        $response .= '"PlotName": "'.$p['plotname'].'",';
        $response .= '"Rentamount": "'.$p['rent'].'",';
          $response .= '"PostImage": "'.$p['postimg'].'",';
        $response .= '"describe": "'.$p['rent_decribe'].'",';
        $response .= '"PostedAt": "'.$p['posted_at'].'"';
     $response .= "},";
                            }
                         $response = substr($response, 0, strlen($response)-1);   
                            $response .= "]"; 
                             http_response_code(200);
                            echo $response;


        }else if ($_GET['url'] == "profileposts") { 
           $start = (int)$_GET['start'];

 $token = $_COOKIE['SNID'];
$userid = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['id'];
$useridtoken = $db->query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($token)))[0]['user_id'];

       if ($userid == $useridtoken) { 
                $timeline=$db->query('SELECT posts.id, posts.size, posts.town, posts.estate, posts.plotname, posts.rent, posts.rent_decribe, posts.posted_at, posts.postimg, users.username, users.phonenumber FROM users, posts WHERE users.id = posts.user_id AND users.id= :userid  ORDER BY posts.posted_at DESC  LIMIT 5 OFFSET '.$start.' ;', array(':userid'=>$useridtoken));
    
//if (isset($_POST['comment'])) {
  //  Comment::createComment($_POST['commentbody'], $_GET['postid'], $userid );
//}
                $response="[";

 foreach($timeline as $p)
                  { 
    $response .= "{";
       $response .= '"PostId": '.$p['id'].',';
       $response .= '"Postedby": "'.$p['username'].'",';
        $response .= '"PhoneNumber": "'.$p['phonenumber'].'",';
        $response .= '"PlotSize": "'.$p['size'].'",';
         $response .= '"Residence": "'.$p['plotname'].'",';
        $response .= '"Town": "'.$p['town'].'",';
        $response .= '"Estate": "'.$p['estate'].'",';
        $response .= '"PlotName": "'.$p['plotname'].'",';
        $response .= '"Rentamount": "'.$p['rent'].'",';
          $response .= '"PostImage": "'.$p['postimg'].'",';
        $response .= '"describe": "'.$p['rent_decribe'].'",';
        $response .= '"PostedAt": "'.$p['posted_at'].'"';
     $response .= "},";
                            }
                         $response = substr($response, 0, strlen($response)-1);   
                            $response .= "]"; 
                             http_response_code(200);
                            echo $response;


        }
      }


} else if ($_SERVER['REQUEST_METHOD'] == "POST") {

 if ($_GET['url'] == "users") {

                $postBody = file_get_contents("php://input");
                $postBody = json_decode($postBody);

                $username = $postBody->username;
                $password = $postBody->password;
                 $email = $postBody->email;
                $phonenumber = $postBody->phonenumber;


               if (!$db->query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {

                if (strlen($username) >= 3 && strlen($username) <= 32) {

                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {

                                if (strlen($password) >= 6 && strlen($password) <= 60) {

                                 if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                    if (!$db->query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {

                                        $db->query('INSERT INTO users VALUES (\'\', :username, :password, :email, \'\',:phonenumber)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email, ':phonenumber'=>$phonenumber));
                                       // Mail::sendMail('Welcome to our Social Network!', 'Your account has been created!', $email);
                                               echo '{ "success": "User Created" }';
                                                         http_response_code(200);

                                                                        // }
                                                                        }
                                                           else {
                                                            echo '{ "Error": "Email in use!" }';
                        http_response_code(409);

                                }
                                  }else {
                                        echo '{ "Error": "Invalid email" }';
                        http_response_code(409);

                                                                        }
                                
                        } else {
                               echo '{ "Error": "password" }';
                        http_response_code(409);

                        }
                        } else {
                                echo '{ "Error": "Invalid username" }';
                        http_response_code(409);

                        }
                } else {
                      echo '{ "Error": "Invalid username" }';
                        http_response_code(409);

                }

        } else {
                echo '{ "Error": "Invalid username or password" }';
                        http_response_code(409);
                    }
                }



        else if($_GET['url'] == "auth") {
                $postBody = file_get_contents("php://input");
                $postBody = json_decode($postBody);

                $username = $postBody->username;
                $password = $postBody->password;
                if ($db->query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
                        if (password_verify($password, $db->query('SELECT password FROM users WHERE username=:username', array(':username'=>$username))[0]['password'])) {
                                $cstrong = True;
                                $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                                $user_id = $db->query('SELECT id FROM users WHERE username=:username', array(':username'=>$username))[0]['id'];
                                $db->query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                               echo '{ "Token": "'.$token.'" }';
                        } else {
                             echo '{ "Error": "Invalid username password" }';
                                http_response_code(401);
                        }
                } else {
                     echo '{ "Error": "Invalid username " }';
                        http_response_code(401);
                }
}


        } else if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
        if ($_GET['url'] == "auth") {
                if (isset($_GET['token'])) {
                        if ($db->query("SELECT token FROM login_tokens WHERE token=:token", array(':token'=>sha1($_GET['token'])))) {
                                $db->query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_GET['token'])));
                                echo '{ "Status": "Success" }';
                                http_response_code(200);
                        } else {
                                echo '{ "Error": "Invalid token" }';
                                http_response_code(400);
                        }
                } else {
                        echo '{ "Error": "Malformed request" }';
                        http_response_code(400);
                }
        }
} else {
        http_response_code(405);
}
?>
