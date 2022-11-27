<?php 
   require_once(__DIR__ . '/../../config/config.php');
   require_once(__DIR__ . '/../../helpers/SessionFlash.php');
   require_once(__DIR__ . '/../../models/Prestation.php');

   // suppression d'une prestation
      try {
         $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
         $deletedPrestation = Prestation::delete($id);
         SessionFlash::set('La prestation a bien été supprimée');
         header('Location: /controllers/admin/prestationListCtrl.php');
         exit();
      } catch (PDOException $e) {
         die('Erreur : ' . $e->getMessage());
      }