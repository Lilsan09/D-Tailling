<?php

// Session start pour les Sessions flash
session_start();
// Récupération de la class session flash içi car on appelle toujours config.php
require_once(__DIR__.'/../helpers/SessionFlash.php');



// Déclaration des Regex
define('REGEX_EMAIL', "^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");

define('REGEX_ZIPCODE', "^[0-9]{5}$");

define('REGEX_NO_NUMBER','^[A-Za-zéèêëàâäôöûüç\' ]+$');

define('REGEX_DATE',"^\d{4}-\d{2}-\d{1,2}$");

define('REGEX_PHONE', '^(\+33|0|0033)[1-9]((\-|\/|\.)?\d{2}){4}$');

define('REGEX_DATE_HOUR',"^\d{4}-\d{2}-\d{1,2}$");



// BASE DE DONNEES
define('DSN', 'mysql:host=localhost;dbname=d-tailing;charset=utf8;port=3306');
define('USER', 'admin');
define('PWD', 'admin');



// Formateur de date ( echo $formatLongFr->format(strtotime("date en texte")) )
// $formatLongFr = new IntlDateFormatter(
//     locale : 'fr_FR',
//     pattern : "EEEE dd MMMM Y 'à' HH'h'mm"
// );