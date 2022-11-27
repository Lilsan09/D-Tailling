<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/Prestation.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../helpers/database.php');


if (!isset($_SESSION['user'])) {
   header('location: /controllers/connexionCtrl.php');
   exit;
}


try {
   // Affichage de la liste des prestations
   $prestations = Prestation::displayAll();

} catch (\Throwable $th) {
   // header('Location: /error.php');
   die;
}


/* ************* AFFICHAGE DES VUES **************************/

include(__DIR__ . '/../../views/templates/sidebar.php');
include(__DIR__ . '/../../views/admin/prestationList.php');
include(__DIR__ . '/../../views/templates/footer.php');

/*************************************************************/
