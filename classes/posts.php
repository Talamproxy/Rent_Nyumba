 <?php
 
 class Post {
	 public static function createPost($postsize, $posttown, $postestate, $plotname,  $postrent, $postrentdescribe, $loggedInUserId, $profileUserId){
						if (strlen($postsize) > 50 || strlen($postsize) < 1) {
                                die('Incorrect size !');
                        }
						 if (strlen($posttown) > 50 || strlen($posttown) < 1) {
                                die('Incorrect town!');
                        }  
						 if (strlen($postestate) > 50 || strlen($postestate) < 1) {
                                die('Incorrect estate!');
                        }
						 if (strlen($postrent) > 50 || strlen($postrent) < 1) {
                                die('Incorrect rent!');
                        }
						if($loggedInUserId == $profileUserId){
						    date_default_timezone_set("Africa/Nairobi");
						DB::query('INSERT INTO posts VALUES (\'\', :postsize, :posttown, :postestate, :plotname, :postrent, :postrentdescribe, now(), :userid,\'\')', array(':postsize'=>$postsize,':posttown'=>$posttown,':postestate'=>$postestate, ':plotname'=>$plotname,':postrent'=>$postrent,':postrentdescribe'=>$postrentdescribe, ':userid'=>$profileUserId));
						
						}
						else{
							die('Incorrect userrr!');
						}
				}

				 public static function createImgPost($postsize, $posttown, $postestate, $plotname,  $postrent, $postrentdescribe, $loggedInUserId, $profileUserId){
						if (strlen($postsize) > 50 || strlen($postsize) < 1) {
                                die('Incorrect size !');
                        }
						 if (strlen($posttown) > 50 || strlen($posttown) < 1) {
                                die('Incorrect town!');
                        }  
						 if (strlen($postestate) > 50 || strlen($postestate) < 1) {
                                die('Incorrect estate!');
                        }
						 if (strlen($postrent) > 50 || strlen($postrent) < 1) {
                                die('Incorrect rent!');
                        }
						if($loggedInUserId == $profileUserId){
						     date_default_timezone_set("Africa/Nairobi");
						DB::query('INSERT INTO posts VALUES (\'\', :postsize, :posttown, :postestate, :plotname, :postrent, :postrentdescribe, now() , :userid, \'\', \'\', \'\')', array(':postsize'=>$postsize,':posttown'=>$posttown,':postestate'=>$postestate, ':plotname'=>$plotname, ':postrent'=>$postrent,':postrentdescribe'=>$postrentdescribe, ':userid'=>$profileUserId));
						$postid=DB::query('SELECT id FROM posts WHERE user_id=:userid ORDER BY id DESC LIMIT 1 ;', array(':userid'=>$loggedInUserId))[0]['id'];
						return $postid;
						
						}
						else{
							die('Incorrect user!');
						}
				}

 }
 ?>
 