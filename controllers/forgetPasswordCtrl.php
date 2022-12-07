<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // recuperation de l'email
   $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
   // verification de l'email
   if (empty($email)) {
      $errors['email'] = 'Champ obligatoire';
   } else {
      $isOk = filter_var($email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => '/' . REGEX_EMAIL . '/')));
      if (!$isOk) {
         $errors['email'] = 'Adresse mail non valide';
      }
      if (!User::checkEmail($email)) {
         $errors['email'] = 'Cette adresse mail n\'existe pas';
      }
   }
   // si pas d'erreur
   if (empty($errors)) {
      // recuperation de l'utilisateur
      $user = User::loginByMail($email);
      // creation du token

      $token = JWT::set($user->Id_users, SECRET_KEY);
      // envoi du mail
      $to = $user->email;

      $subject = 'Mot de passe oublié';
      $message = 'Bonjour ' . $user->firstname . ' ' . $user->lastname . ',<br><br>Vous avez demandé à réinitialiser votre mot de passe.<br><br><a href="' . $_SERVER['HTTP_ORIGIN'] . '/controllers/newPasswordCtrl.php?token=' . $token . '">Cliquez ici pour réinitialiser votre mot de passe</a><br><br>Cordialement,<br>L\'équipe de ' . SITE_NAME;
      $headers = 'From: ' . SITE_NAME . ' <' . EMAIL . '>' . "\r\n" .
         'Reply-To: ' . EMAIL . "\r\n" .
         'Content-type: text/html; charset=utf-8' . "\r\n" .
         'X-Mailer: PHP/' . phpversion();
      mail($to, $subject, $message, $headers);
      // redirection vers la page de connexion
      SessionFlash::set('Un mail vous a été envoyé pour réinitialiser votre mot de passe.');
      header('Location: /controllers/homeCtrl.php');
      exit;
   }
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/forgetPassword.php');
include(__DIR__ . '/../views/templates/footer.php');
