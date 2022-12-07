<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/SessionFlash.php');

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
      // test si l'utilisateur existe
      if (!$user) {
         $errors['connexion'] = 'Adresse mail inconnue';
      } else {
         // Si il n'y a pas d'erreurs et que l'utilisateur a valider son compte, on connecte l'utilisateur.
         $password_hash = $user->password;
         $result = password_verify($password, $password_hash);
         if (!$result) {
            $errors['connexion'] = 'Les informations des connexion ne sont pas bonnes!';
         }
         if ($user->valided_at != null) {
            if (empty($errors)) {
               $user->password = null;
               $_SESSION['user'] = $user;
               header('Location: /controllers/homeCtrl.php');
               exit;
            }
            // Sinon on le renvoie sur la page de connexion.
         } else {
            $errors['connexion'] = 'Vous devez valider votre compte avant de vous connecter.';
         }
      }
   }
} catch (PDOException $e) {
   die('Erreur : ' . $e->getMessage());
}
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/connexion.php');
include(__DIR__ . '/../views/templates/footer.php');
