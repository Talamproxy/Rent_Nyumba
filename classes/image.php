 <?php
class Image {


 public static function uploadImage($formname, $query, $params) {

 $image= base64_encode(file_get_contents($_FILES[$formname]['tmp_name']));


$options=array('http'=>array(
	'method'=>"POST",
	'header'=>"Authorization: Bearer 15d9f14d15fa3688104c12f29b2bbb2a6320cd6b\n".
	"Content-Type: application/x-www-form-urlencoded",
	'content'=>$image
));

$context= stream_context_create($options);

$imgurURL="https://api.imgur.com/3/image";

 if ($_FILES[$formname]['size'] > 10240000) {

                        die('Image too big, must be 10MB or less!');
                }



$response= file_get_contents($imgurURL, false, $context);
 $response= json_decode($response);
$preparams =array($formname=>$response->data->link);
$params=$preparams + $params;
DB::query($query, $params);
}};

class Image1 {


 public static function uploadImage1($formname, $query, $params) {

 $image= base64_encode(file_get_contents($_FILES[$formname]['tmp_name']));


$options=array('http'=>array(
	'method'=>"POST",
	'header'=>"Authorization: Bearer 15d9f14d15fa3688104c12f29b2bbb2a6320cd6b\n".
	"Content-Type: application/x-www-form-urlencoded",
	'content'=>$image
));

$context= stream_context_create($options);

$imgurURL="https://api.imgur.com/3/image";

 if ($_FILES[$formname]['size'] > 10240000) {

                        die('Image too big, must be 10MB or less!');
                }



$response= file_get_contents($imgurURL, false, $context);
 $response= json_decode($response);
$preparams =array($formname=>$response->data->link);
$params=$preparams + $params;
DB::query($query, $params);
}};


class Image2 {


 public static function uploadImage2($formname, $query, $params) {

 $image= base64_encode(file_get_contents($_FILES[$formname]['tmp_name']));


$options=array('http'=>array(
	'method'=>"POST",
	'header'=>"Authorization: Bearer 15d9f14d15fa3688104c12f29b2bbb2a6320cd6b\n".
	"Content-Type: application/x-www-form-urlencoded",
	'content'=>$image
));

$context= stream_context_create($options);

$imgurURL="https://api.imgur.com/3/image";

 if ($_FILES[$formname]['size'] > 10240000) {

                        die('Image too big, must be 10MB or less!');
                }



$response= file_get_contents($imgurURL, false, $context);
 $response= json_decode($response);
$preparams =array($formname=>$response->data->link);
$params=$preparams + $params;
DB::query($query, $params);
}};
?>