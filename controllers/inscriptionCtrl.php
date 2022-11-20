<?php
   require_once(__DIR__.'/../config/config.php');
   

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      ////////////////////////////////////////////////////////////////
      //////////////////////////// NETTOYAGE//////////////////////////
      ////////////////////////////////////////////////////////////////
      $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
      $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
      $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
      $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
      $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
      $confirmpassword = trim(filter_input(INPUT_POST, 'confirmpassword', FILTER_SANITIZE_SPECIAL_CHARS));
   
   ////////////////// NOM ///////////////////
   if (empty($lastname)) {
      $errorLastname = 'Champ obligatoire';
   } else {
      $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
      if ($isOk == false) {
         $errorLastname = 'Nom pas conforme';
      }
   }
   ///////////////// PRÉNOM //////////////////
   if (empty($firstname)) {
      $errorFirstname = 'Champ obligatoire';
   } else {
      $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
      if ($isOk == false) {
         $errorFirstname = 'Champ obligatoire';
      }
   }
   ///////////////// MAIL //////////////////
   if (empty($email)) {
      $errorMail = 'Champ obligatoire';
   } else {
      $isOk = filter_var($email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => '/' . REGEX_EMAIL . '/')));
      if (!$isOk) {
         $errorMail = 'Adresse mail non valide';
      }
   }
   // SessionFlash::set('T\'es inscrit !');
   // header('Location: /controllers/homeCtrl.php');
   }
   
   include(__DIR__ . '/../views/templates/header.php');
   include(__DIR__ . '/../views/inscription.php');
   include(__DIR__ . '/../views/templates/footer.php');
