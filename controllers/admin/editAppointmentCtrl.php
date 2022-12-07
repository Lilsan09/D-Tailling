<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../models/Appointment.php');
require_once(__DIR__ . '/../../models/Car.php');
require_once(__DIR__ . '/../../models/Prestation.php');


// modification d'un rendez-vous depuis le dashboard admin

// récuperation de l'id du rendez-vous à modifier depuis l'url
// récupération du rendez-vous à modifier
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
   $users = User::getAll();
   $prestations = Prestation::displayAll();
   $cars = Car::displayAll();
   $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
   $appointment = Appointment::getById($id);
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $user = intval(filter_input(INPUT_POST, 'user', FILTER_SANITIZE_NUMBER_INT));
      if (empty($user)) {
         $errors['user'] = 'Le champ est obligatoire';
      } else {
         $isOk = filter_var($user, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NUMBER . '/')));
         if (!$isOk) {
            $errors['user'] = 'L\'utilisateur n\'est pas valide';
         }
      }
      // DATE ET HEURE DE RDV
      // On verifie l'existance de la date et de l'heure et on nettoie 
      $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
      if (empty($date)) {
         $errors['date'] = 'Le champ est obligatoire';
      } else {
         $isOk = filter_var($date, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_DATE . '/')));
         if (!$isOk) {
            $errors['date'] = 'La date n\'est pas valide';
         }
      }

      // récupération des heures et des minutes avec formatage sur 2 chiffres
      $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_SPECIAL_CHARS);

      if (empty($hour)) {
         $errors['hour'] = 'Veuillez choisir un horaire de rendez-vous.';
      }
      if (empty($errors)) {
         $dateHour = $date . ' ' . $hour;
      }
      // ********** FIN DATE ET HEURE DE RDV **********

      $id_prestations = intval(filter_input(INPUT_POST, 'prestations', FILTER_SANITIZE_NUMBER_INT));

      $id_cars = intval(filter_input(INPUT_POST, 'cars', FILTER_SANITIZE_NUMBER_INT));

      if (empty($errors)) {
         $modifiedAppointment = new Appointment();
         $modifiedAppointment->setDateHour($dateHour);
         $modifiedAppointment->setId_prestations($id_prestations);
         $modifiedAppointment->setId_cars($id_cars);
         $modifiedAppointment->setId_users($user);
         $modifiedAppointment->setId($id);
         if ($modifiedAppointment->modify()) {

            $appointment = $modifiedAppointment;
            // $appointment::getById($id);

            SessionFlash::set('Le rendez-vous a bien été modifié.');

            header('Location: /controllers/admin/appointmentListCtrl.php');
            exit();
         }
      }
   }
} catch (PDOException $e) {
   SessionFlash::set('Une erreur est survenue');
   header('Location: /controllers/admin/appointmentListCtrl.php');
   exit();
}

include(__DIR__ . '/../../views/templates/sidebar.php');
include(__DIR__ . '/../../views/admin/editAppointment.php');
include(__DIR__ . '/../../views/templates/lightFooter.php');
