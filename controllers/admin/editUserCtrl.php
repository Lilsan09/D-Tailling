<?php
// modifier un utilisateur depuis la liste des utilisateurs
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../models/User.php');

if (!isset($_SESSION['user'])) {
   header('location: /controllers/connexionCtrl.php');
   exit;
} else {
   if ($_SESSION['user']->role != 1) {
      header('location: /controllers/homeCtrl.php');
      exit;
   }
}
   $id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
   $user = User::displayOne($id);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   /************************* LASTNAME *************************/
   //**** NETTOYAGE ****/
   $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));

   //**** VERIFICATION ****/
   if (empty($lastname)) {
      $errors['lastname'] = 'Le champ est obligatoire';
   } else {
      $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
      if (!$isOk) {
         $errors['lastname'] = 'Merci de choisir un nom valide';
      }
   }
   /***********************************************************/



   /************************* FIRSTNAME ***********************/
   //**** NETTOYAGE ****/
   $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));

   //**** VERIFICATION ****/
   if (empty($firstname)) {
      $errors['firstname'] = 'Le champ est obligatoire';
   } else {
      $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
      if (!$isOk) {
         $errors['firstname'] = 'Le prénom n\'est pas valide';
      }
   }
   /***********************************************************/


   /************************** PHONE **************************/
   //**** NETTOYAGE ****/

   $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES));

   //**** VERIFICATION ****/
   if (!empty($phone)) {
      $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_PHONE . '/')));
      if (!$isOk) {
         $errors['phone'] = 'Le numero n\'est pas valide, les séparateur sont - . /';
      }
   }
   /***********************************************************/

   $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_SPECIAL_CHARS);
   if (empty($adress)) {
      $errors['adress'] = 'Champ obligatoire';
   }

   ///////////////// ZIPCODE //////////////////
   $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);
   if (empty($zipcode)) {
      $errors['zipcode'] = 'Champ obligatoire';
   } else {
      $isOk = filter_var($zipcode, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
      if ($isOk == false) {
         $errors['zipcode'] = 'Code postal non valide';
      }
   }

   /*************************** MAIL **************************/
   //**** NETTOYAGE ****/
   $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

   //**** VERIFICATION ****/
   if (empty($email)) {
      $errors['email'] = 'Le champ est obligatoire';
   } else {
      $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!$isOk) {
         $errors['email'] = 'Le mail n\'est pas valide';
      }
      // Si le mail de l'input est nouveau ET qu'il existe déjà en bdd, --> Erreur
      // if ($email != $user->email && Patient::checkEmail($email)) {
      //    $errors['email'] = 'Le mail existe déjà';
      // }
   }

   /*************************** ROLE **************************/
   //**** NETTOYAGE ****/
   $role = trim(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));

   //**** VERIFICATION ****/
   if (empty($role)) {
      $errors['role'] = 'Le champ est obligatoire';
   } else {
      $isOk = filter_var($role, FILTER_VALIDATE_INT);
      if (!$isOk) {
         $errors['role'] = 'Le role n\'est pas valide';
      }
   }

   /***********************************************************/

   // Si il n'y a pas d'erreurs, on met à jour le patient.
   if (empty($errors)) {

      //**** HYDRATATION ****/
      $userModified = new User;
      $userModified->setId($id);
      $userModified->setLastname($lastname);
      $userModified->setFirstname($firstname);
      $userModified->setPhone($phone);
      $userModified->setEmail($email);
      $userModified->setAdress($adress);
      $userModified->setZipcode($zipcode);
      $userModified->setRole($role);

      $userModified->modify($id);
      // On récupère les données de l'utilisateur mis à jour
      $user = $userModified;
         SessionFlash::set('L\'utilisateur a bien été modifié');
         header('location: /controllers/admin/userListCtrl.php');
         exit;
      } else {
         SessionFlash::set('Une erreur est survenue, l\'utilisateur n\'a pas été modifié');
         header('location: /controllers/admin/userListCtrl.php');
         exit;
      }
   }
include(__DIR__ . '/../../views/templates/sidebar.php');
include(__DIR__ . '/../../views/admin/editUser.php');
include(__DIR__ . '/../../views/templates/lightFooter.php');
