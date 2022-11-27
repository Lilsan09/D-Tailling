<?php
   require_once(__DIR__ . '/../../config/config.php');
   require_once(__DIR__ . '/../../models/User.php');
   require_once(__DIR__ . '/../../helpers/SessionFlash.php');


   try {
      $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
      if (User::delete($id)){
         SessionFlash::set('Le compte a bien été supprimé');
         header('Location: /controllers/admin/userListCtrl.php');
         exit();
      } else {
         SessionFlash::set('Une erreur est survenue');
         header('Location: /controllers/admin/userListCtrl.php');
         exit();
      }
   } catch (PDOException $e) {
      die('Erreur : ' . $e->getMessage());
   }