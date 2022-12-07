<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../models/Appointment.php');
require_once(__DIR__ . '/../../models/Car.php');




try {
   if (!isset($_SESSION['user'])) {
      header('location: /controllers/connexionCtrl.php');
      exit;
   } else {
      if ($_SESSION['user']->role != 1) {
         header('location: /controllers/homeCtrl.php');
         exit;
      }
   }
   // }
   $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
   if (Appointment::delete($id) == true){
      SessionFlash::set('Le rendez-vous a bien été supprimé');
      header('Location: /controllers/admin/appointmentListCtrl.php');
      exit();
   } else {
      SessionFlash::set('Une erreur est survenue');
      header('Location: /controllers/admin/appointmentListCtrl.php');
      exit();
   }
} catch (PDOException $e) {
   die('Erreur : ' . $e->getMessage());
}