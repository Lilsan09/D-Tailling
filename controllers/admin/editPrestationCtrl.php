<?php
require_once(__DIR__ . '/../../models/Prestation.php');
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../helpers/database.php');

try {
   if (!isset($_SESSION['user'])) {
      header('location: /controllers/connexionCtrl.php');
      exit;
   } else {
      if ($_SESSION['user']->role != 1) {
         header('location: /controllers/homeCtrl.php');
         exit;
      }
   }
   $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
   $prestation = Prestation::displayOne($id);
   // Ajout d'une prestation
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
      $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
      $price = trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT));
      $image = $_FILES['image']['name'];

      if (empty($title)) {
         $errors['title'] = 'Champ obligatoire';
      }
      if (empty($description)) {
         $errors['description'] = 'Champ obligatoire';
      }
      if (empty($price)) {
         $errors['price'] = 'Champ obligatoire';
      }
      if (empty($image)) {
         $errors['image'] = 'L\image est obligatoire';
      }
      $fileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
      if ($fileType != 'jpeg') {
         $errors['image'] = 'Seuls les fichiers JPEG sont autorisés.';
      }
      $fileSize = $_FILES['image']['size'];
      if ($fileSize > 5000000) {
         $errors['image'] = 'Désolé, votre fichier est trop volumineux.';
      }
      if (empty($errors)) {
         $prestation = new Prestation();
         $prestation->setTitle($title);
         $prestation->setDescription($description);
         $prestation->setPrice($price);
         if ($IsPrestationAdded = $prestation->modify($id)) {
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/prestations/'; 
            $sth = Database::getInstance();
            // $lastInsertId = $sth->lastInsertId();
            $target_file = $id . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $target_path = $target_dir . $target_file;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
               // $isOk = 'Le fichier ' . basename($_FILES['image']['name']) . ' a été téléchargé.';
               SessionFlash::set('La prestation a bien été ajoutée');
               header('Location: /controllers/admin/prestationListCtrl.php');
               exit;
            } else {
               $errors['image'] = 'Une erreur est survenue lors de l\'upload de l\'image';
               SessionFlash::set('Une erreur est survenue lors de l\'ajout de la prestation');
               header('Location: /controllers/admin/prestationListCtrl.php');
               exit;
            }
         }
      }
   }
} catch (PDOException $e) {
   SessionFlash::set('Une erreur est survenue');
   header('Location: /admin/addPrestationCtrl.php');
   exit();
}
include(__DIR__ . '/../../views/templates/sidebar.php');
include(__DIR__ . '/../../views/admin/editPrestation.php');
include(__DIR__ . '/../../views/templates/lightFooter.php');