<?php

namespace App\Http\Controllers\Site;

// require './vendor/autoload.php';
// require 'class.phpmailer.php';
// require 'PHPMailerAutoload.php';

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Manchete;                                                   
use App\Models\TemaDaManchete;
// use vendor\phpmailer\phpmailer\src;
// use PHPMailer\PHPMailer;
// use \PHPMailer;
// use gepes\vendor\phpmailer\phpmailer\src\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;
// require_once('vendor\phpmailer\phpmailer\src\PHPMailer.php');

class GepesController extends Controller
{
    public function index(){

        $manchetes = Manchete::all();
        $manchetes->load('TemaDaManchete');
        $temas = TemaDaManchete::all();

        $quemSomos = new Manchete();
        $oqueFazemos = new Manchete();
        $linhas = new Manchete();
        $publicacoes = new Manchete();

        foreach($manchetes as $manchete)

            // $manchete->setTema($temas); todo - if controller logic get´s too big send create methods to model layer entity to handle this processing

        foreach($temas as $tema){
            if ($tema->id == $manchete->temaId) 
                $manchete->tema = $tema->tema; 
            if ($tema->tema == 'Quem somos')
                $quemSomos = $manchete;
            if ($tema->tema == 'O Que Fazemos')
                $oqueFazemos = $manchete;
            if ($tema->tema == 'Linhas de Pesquisa')
                $linhas = $manchete;
            if ($tema->tema == 'Publicações')
                $publicacoes = $manchete;
                
        }

        // dd($manchetes);

        return view('site.home.gepes_home',  compact('manchetes', 'quemSomos', 'oqueFazemos', 'linhas', 'publicacoes'));
    }

    public function sendMail(Request $post) {
        // dd($post);

        $mail = new PHPMailer;
        
        $mail->IsSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // ou 587 para TLS

        $mail->SMTPAuth = true;

        // $mail->Host = 'localhost';
        // $mail->Port = 2500;
        $mail->CharSet = 'utf-8';


        $mail->Username = 'adrielwerlich@gmail.com';
        $mail->Password = 'a455079w';
        $mail->SMTPSecure = 'ssl'; // or TLS

        $mail->isHTML(true);


         
        /* Set the mail sender. */
        $mail->setFrom($post['email'], $post['name'], 0);

        /* Add a recipient. */
        $mail->addAddress('adriel@uniplaclages.edu.br');

        /* Set the subject. */
        $mail->Subject = 'Mensagem PhpMailer';

        /* Set the mail message body. */
        $mail->Body = $post['message'];

        /* Finally send the mail. */
        if (!$mail->send())
        {
            /* PHPMailer error. */
            // echo $mail->ErrorInfo;
            dd($mail->ErrorInfo);
        }
        
        dd($mail);

        return redirect()
            ->route('home')
            ->with('success', 'email enviado');

        // $emailSubject = 'Customer Has a Question!';
        // $mailto = 'adrielwerlich@gmail.com';

        // /* These will gather what the user has typed into the fieled. */

        // $nameField = $_POST['name'];
        // $emailField = $_POST['email'];
        // $questionField = $_POST['message'];

        // /* This takes the information and lines it up the way you want it to be sent in the email. */

        // $body = <<<EOD
        // <br><hr><br>
        // Name: $name <br>
        // Email: $email <br>
        // Question: $question <br>
        // EOD;

        // $headers = "From: $email\r\n"; // This takes the email and displays it as who this email is from.
        // $headers .= "Content-type: text/html\r\n"; // This tells the server to turn the coding into the text.
        // $success = mail($mailto, $emailSubject, $body, $headers); // This tells the server what to send.
    }
}
