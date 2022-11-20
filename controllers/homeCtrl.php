<?php
   require_once(__DIR__.'/../config/config.php');
   require_once(__DIR__.'/../helpers/SessionFlash.php');






// Appelle des vues (doit rester à la fin)
include(__DIR__.'./../views/templates/header.php');
include(__DIR__.'./../views/home.php');
include(__DIR__.'./../views/templates/footer.php');