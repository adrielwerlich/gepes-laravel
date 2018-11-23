<!-- <php

namespace App\Http\Controllers\Site;


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

  try {
      //Server settings
      $mail->SMTPDebug = 2;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.google.com;  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'adriel@uniplaclages.edu.br';                 // SMTP username
      $mail->Password = '32231167';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('adrielwerlich@gmail.com', 'second arg');
      $mail->addAddress($_POST['email']);     // Add a recipient
      <-- $mail->addAddress('ellen@example.com');               // Name is optional --
      $mail->addReplyTo('adriel@uniplaclages.edu.br', 'Information reply');
      <!-- $mail->addCC('cc@example.com'); -->
      <!-- $mail->addBCC('bcc@example.com'); --

      //Attachments
      <!-- $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments -->
      <!-- $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name --

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Name = $_POST['name'];
      $mail->Mail    = $_POST['email']';
      $mail->Message = $_POST['message'];

      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
 -->
