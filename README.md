# Utilisation de PHPMailer pour Envoyer des Emails via MailHog
PHPMailer est une bibliothèque de gestion d'emails pour PHP qui offre une grande flexibilité, y compris la possibilité de spécifier un serveur SMTP pour l'envoi d'emails. Voici comment vous pourriez configurer PHPMailer pour utiliser MailHog :

## Prérequis
Assurez-vous d'avoir Composer installé dans votre projet. Si ce n'est pas le cas, vous pouvez le télécharger et l'installer depuis getcomposer.org.

## Installation de PHPMailer
Ouvrez un terminal ou une invite de commande, naviguez jusqu'au dossier de votre projet Laragon et exécutez :

```bash
composer require phpmailer/phpmailer
```

## Script d'Exemple pour Envoyer un Email avec PHPMailer et MailHog

Créez un fichier PHP (par exemple, sendmail.php) dans votre projet Laragon et ajoutez le code suivant :

```php
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
```

Ce script configure PHPMailer pour utiliser MailHog comme serveur SMTP sans authentification, puis envoie un email simple.

## Testez Votre Script
Assurez-vous que MailHog est en cours d'exécution.
Accédez à votre script via un navigateur ou exécutez-le directement à l'aide de PHP depuis la ligne de commande : 
```bash
php send_email.php
```
Ouvrez l'interface utilisateur de MailHog (habituellement sur http://localhost:8025) pour voir l'email que vous avez envoyé.