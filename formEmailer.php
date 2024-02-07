<?php
require_once "vendor/autoload.php";
var_dump($_POST);
if ($_POST['submit']) {
echo 'submitted';
}

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';
// $mail = new PHPMailer(true);
// $mail->isSMTP();
// // $mail = new PHPMailer; //From email address and name 
// $mail->From = "rsvp@genevieveandmatthew.co.uk"; 
// $mail->FromName = "Full Name"; //To address and name 
// $mail->addAddress("ste21k@hotmail.com");//Recipient name is optional
// $mail->isHTML(true); 
// $mail->Subject = "Subject Text"; 
// $mail->Body = "<i>Mail body in HTML</i>";
// $mail->AltBody = "This is the plain text version of the email content"; 
// if(!$mail->send()) 
// {
// echo "Mailer Error: " . $mail->ErrorInfo; 
// } 
// else { echo "Message has been sent successfully"; 
// }

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("rsvp@genevieveandmatthew.co.uk", "Example User");
$email->setSubject("RSVP");
$email->addTo("ste21k@hotmail.com", "Steven");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

?>