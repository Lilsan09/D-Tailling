<?php
   require_once(__DIR__ . '/../config/config.php');
   require_once(__DIR__ . '/../helpers/database.php');
   require_once(__DIR__ . '/../helpers/SessionFlash.php');
   require_once(__DIR__ . '/../models/Prestation.php');

   
   $prestations = Prestation::displayAll();




   include(__DIR__.'/../views/templates/header.php');
   include(__DIR__.'/../views/prestation.php');
   include(__DIR__.'/../views/templates/footer.php');