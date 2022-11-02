<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require '../config/correo.conf.php';
require '../models/alumno.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(empty($_POST['correos'])){
    
}

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = EMAIL;                     //SMTP username
    $mail->Password   = PASS;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL, 'no-reply');
    $lista=explode(",", $_POST['correos']);
    var_dump($lista);
    
    if (in_array("all", $lista)) {
        $lista=Alumno::getAllCorreoAlumno();
        foreach ($lista as $registro){
            //$mail->addAddress(Alumno::getCorreoAlumno($registro['correo']));
            echo "<br>".$registro[0]."<br>";
        }
    }else{
        foreach ($lista as $registro) { 
            if($registro != 'null'){
                $mail->addAddress(Alumno::getCorreoAlumno($registro)[0][0]);

            }
        }
    }
    
    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = $_POST['titulo'];
    $mail->Body    = $_POST['info'];
    $mail->AltBody = $_POST['info'];
    
    $mail->send();
    echo 'Message has been sent';
    echo "<script>location.href='../pages/admin.php'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}