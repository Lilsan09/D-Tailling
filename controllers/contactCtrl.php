<?php
   require_once(__DIR__ . '/../helpers/SessionFlash.php');
   
   // var_dump($message);
   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      $message = $_POST['message'];
      $email = $_POST['email'];
      if (isset($_POST['message'])) {
      $retour = mail('dtailingfrance@gmail.com', 'Envoi depuis la page Contact', $message, 'From: ' . $email . "\r\n" . 'Reply-to: ' . $email);
      if($retour)
         SessionFlash::set('Votre message a bien été envoyé');
   } else {
      SessionFlash::set('Erreur lors de l\'envoi du message');
   }
}
   include(__DIR__.'/../views/templates/header.php');
   include(__DIR__.'/../views/contact.php');
   include(__DIR__.'/../views/templates/footer.php');