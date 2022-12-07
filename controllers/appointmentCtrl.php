<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/database.php');
require_once(__DIR__ . '/../helpers/SessionFlash.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Car.php');
require_once(__DIR__ . '/../models/Prestation.php');
require_once(__DIR__ . '/../models/User.php');

try {
   if (!isset($_SESSION['user'])) {
      header('Location: /controllers/connexionCtrl.php');
      exit();
   }
   $user = $_SESSION['user'];

   // Appel des prestations
   $prestations = Prestation::displayAll();
   // var_dump($prestations[0]->Id_prestations);



   // Appel des véhicules
   $cars = Car::displayAll();

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
         $appointment = new Appointment();
         $appointment->setDateHour($dateHour);
         $appointment->setId_prestations($id_prestations);
         $appointment->setId_cars($id_cars);
         $appointment->setId_users($user->Id_users);

         $appointment->add();
         header('Location: /controllers/userAppointmentCtrl.php');
         SessionFlash::set('Votre rendez-vous a bien été pris en compte');
      }
   }
} catch (PDOException $e) {
   SessionFlash::set('Une erreur est survenue');
   header('Location: /controllers/appointmentCtrl.php');
   exit();
}





// Appelle des vues (doit rester à la fin)
include(__DIR__ . '/../views/templates/header.php');
include(__DIR__ . '/../views/appointment.php');
include(__DIR__ . '/../views/templates/footer.php');
