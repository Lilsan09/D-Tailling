<?php
   require_once(__DIR__ . '/../config/config.php');
   require_once(__DIR__ . '/../models/User.php');
   require_once(__DIR__ . '/../helpers/SessionFlash.php');


   try {
      if (isset($_SESSION['user'])) {
         $user = $_SESSION['user'];
         $id = $user->Id_users;
         $deletedUser = new User;
         $deletedUser->setId($id);
         $deletedUser->delete($id);
         session_destroy();
         SessionFlash::set('Votre compte a bien été supprimé');
         header('Location: /controllers/homeCtrl.php');
         exit();
      } else {
         SessionFlash::set('Une erreur est survenue');
         header('Location: /controllers/homeCtrl.php');
         exit;
      }
   } catch (PDOException $e) {
      die('Erreur : ' . $e->getMessage());
   }