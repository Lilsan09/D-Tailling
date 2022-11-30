<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/database.php');
require_once(__DIR__ . '/../helpers/SessionFlash.php');
require_once(__DIR__ . '/../models/Appointment.php');
require_once(__DIR__ . '/../models/Car.php');

// Récupération de l'utilisateur connecté
$id_user = $_SESSION['user']->Id_users;

// Récupération des rendez-vous de l'utilisateur connecté
$appointments = Appointment::displayAllByUser($id_user);


include(__DIR__.'/../views/templates/header.php');
include(__DIR__.'/../views/userAppointment.php');
include(__DIR__.'/../views/templates/footer.php');