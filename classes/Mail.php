<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require './phpmailer/vendor/autoload.php';
class Mail {
        public static function sendMail($subject, $body, $address, $message) {
              $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'malibu.websitewelcome.com';
                $mail->Port = 465;
               // $mail->isHTML();
             $mail->CharSet = 'UTF-8';

                $mail->Username = 'info@rentnyumba.co.ke';
                $mail->Password = 'encryptO@1';
                $mail->SetFrom('info@rentnyumba.co.ke', 'Talnet.ke');
                $mail->Subject = $subject;
                $mail->msgHTML('Message');
                $mail->Body = $body;
                $mail->AddAddress($address,'Talnet');
                //$mail->msgHTML(file_get_contents('newpost.php'), __DIR__);
//Replace the plain text body with one created manually
            $mail->AltBody = 'Sent from Talnet.ke';
//Attach an image file
           $mail->addAttachment('assets/img/avatar.png');
                $mail->Send();
        
   if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {

                                         
                                        echo "<script type='text/javascript'>alert('$message');</script>";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
        }




}


