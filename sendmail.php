<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = false;
    $mail->Port = 1025;

    // Destinataires
    $mail->setFrom('exemple@exemple.com', 'Expediteur');
    $mail->addAddress('destinataire@exemple.com', 'Destinataire');

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = 'Sujet de Test';
    $mail->Body    = 'Ceci est le corps du message en <b>HTML</b>';

    $mail->send();
    echo 'Message envoyé';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Erreur de Mailer: {$mail->ErrorInfo}";
}
