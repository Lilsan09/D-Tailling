<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');
require_once(__DIR__ . '/../helpers/SessionFlash.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   //////////////////////////// NETTOYAGE//////////////////////////
   $token = filter_input(INPUT_GET, 'token');
   $id = JWT::get($token);
   $password = filter_input(INPUT_POST, 'password');
   $confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

   ///////////////// PASSWORD //////////////////
   if (empty($password)) {
      $errors['password'] = 'Champ obligatoire';
   }
   // Vérification de la confirmation du mot de passe
   if (empty($confirmPassword)) {
      $errors['password'] = 'Champ obligatoire';
   } else {
      if ($confirmPassword != $password) {
         $errors['password'] = 'Les mots de passe ne correspondent pas';
      }
   }
   // mise a jour du mot de passe si il y a pas d'erreur
   if (empty($errors)) {
      $password = password_hash($password, PASSWORD_DEFAULT);

      User::modifyPassword($id, $password);
      SessionFlash::set('Votre mot de passe a bien été modifié');
      header('Location: /controllers/connexionCtrl.php');
      exit;
   }
   
}

include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/newPasswordForm.php');
include(__DIR__ . '/../views/templates/footer.php');