<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../helpers/database.php');

if (!isset($_SESSION['user'])) {
   header('location: /controllers/connexionCtrl.php');
   exit;
} else {
   if ($_SESSION['user']->role != 1) {
      header('location: /controllers/homeCtrl.php');
      exit;
   }
}





include(__DIR__ . '/../../views/templates/sidebar.php');
include(__DIR__ . '/../../views/admin/dashboard.php');
include(__DIR__ . '/../../views/templates/lightFooter.php');
