<?php

// Session start pour les Sessions flash
session_start();
// Récupération de la class session flash içi car on appelle toujours config.php
require_once(__DIR__ . '/../helpers/SessionFlash.php');



// Déclaration des Regex
define('REGEX_EMAIL', "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");

define('REGEX_ZIPCODE', "^[0-9]{5}$");

define('REGEX_NO_NUMBER', '^[A-Za-zéèêëàâäôöûüç\' ]+$');

define('REGEX_DATE', "^\d{4}-\d{2}-\d{1,2}$");

define('REGEX_PHONE', '^(\+33|0|0033)[1-9]((\-|\/|\.)?\d{2}){4}$');

define('REGEX_DATE_HOUR', "^\d{4}-\d{2}-\d{1,2}$");
// regex pour les noms d'utilisateur
define('REGEX_USERNAME', '^[A-Za-zéèêëàâäôöûüç\' ]+$');


// On definit le nombre d'éléments par page
define('NB_ELEMENTS_BY_PAGE', 10);


// BASE DE DONNEES
define('DSN', 'mysql:host=localhost;dbname=d-tailing;charset=utf8;port=3306');
define('USER', 'admin');
define('PWD', 'admin');

// DECLARATION DU TABLEAU D'HORRAIRES
$hoursAppt = [
   '08:00',
   '10:00',
   '12:00',
   '14:00',
   '16:00',
   '18:00'
];

// Formateur de date ( echo $formatLongFr->format(strtotime("date en texte")) )
$formatDateFr = new IntlDateFormatter(
   'fr_FR',
   IntlDateFormatter::FULL,
   IntlDateFormatter::FULL,
   'Europe/Paris',
   IntlDateFormatter::GREGORIAN,
   "EEEE dd MMMM Y",
);
$formatHourFr = new IntlDateFormatter(
   'fr_FR',
   IntlDateFormatter::FULL,
   IntlDateFormatter::FULL,
   'Europe/Paris',
   IntlDateFormatter::GREGORIAN,
   "HH'h'",
);

// $date = $formatDateFr->format($dateHour));
// $hour = $formatHourFr->format($dateHour));
