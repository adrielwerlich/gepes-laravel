<?php

namespace App\Http\Site;

/* These are the variable that tell the subject of the email and where the email will be sent.*/

$emailSubject = 'Customer Has a Question!';
$mailto = 'adriel@gmail.com';

/* These will gather what the user has typed into the fieled. */

$nameField = $_POST['name'];
$emailField = $_POST['email'];
$questionField = $_POST['message'];

/* This takes the information and lines it up the way you want it to be sent in the email. */

$body = <<<EOD
<br><hr><br>
Name: $name <br>
Email: $email <br>
Question: $question <br>
EOD;

$headers = "From: $email\r\n"; // This takes the email and displays it as who this email is from.
$headers .= "Content-type: text/html\r\n"; // This tells the server to turn the coding into the text.
$success = mail($mailto, $emailSubject, $body, $headers); // This tells the server what to send.

dd($success);