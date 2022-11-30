<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');

try {
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      ////////////////////////////////////////////////////////////////
      //////////////////////////// NETTOYAGE//////////////////////////
      ////////////////////////////////////////////////////////////////
      $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
      $password = filter_input(INPUT_POST, 'password');

      ///////////////// MAIL //////////////////
      if (empty($email)) {
         $errors['email'] = 'Champ obligatoire';
      } else {
         $isOk = filter_var($email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => '/' . REGEX_EMAIL . '/')));
         if (!$isOk) {
            $errors['email'] = 'Adresse mail non valide';
         }
      }
      // /////////////// MOT DE PASSE //////////////////
      $user = User::loginByMail($email);
      //$password_hash = $user->getPassword();
      $password_hash = $user->password;
      $result = password_verify($password, $password_hash);
      if (!$result) {
         $errors['password'] = 'Les informations des connexion ne sont pas bonnes!';
      }

      if (empty($errors)) {
         //$user->setPassword(null);
         $user->password = null;
         $_SESSION['user'] = $user;
         header('Location: /controllers/homeCtrl.php');
         exit();
      }
   }
} catch (PDOException $e) {
   die('Erreur : ' . $e->getMessage());

}
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/connexion.php');
include(__DIR__ . '/../views/templates/footer.php');
