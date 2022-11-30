<?php
   require_once(__DIR__ . '/../config/config.php');
   require_once(__DIR__ . '/../models/User.php');
   require_once(__DIR__ . '/../helpers/database.php');
   require_once(__DIR__ . '/../helpers/SessionFlash.php');

   
   
   try {

   // verifier si la session existe
      if (isset($_SESSION['user'])) {
         $user = $_SESSION['user'];
         $id = $user->Id_users;
      } else {
         header('Location: /controllers/homeCtrl.php');
         exit;
      }
   // verifier si le formulaire est soumis
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
            // if ($email != $user->email && Patient::isMailExists($email)) {
            //    $errors['email'] = ERRORS[5];
            // }
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
            
            $userModified->modify($id);
            // On récupère les données de l'utilisateur mis à jour
            $user = $userModified;
            
            $_SESSION['user'] = User::displayOne($id);
            $_SESSION['user']->password = null;
            SessionFlash::set('Votre profil a bien été mis à jour');
         }

         // $appointments = Appointment::getAll($id);
   }

      
   } catch (PDOException $e) {
      die('Erreur : ' . $e->getMessage());
   }

   // Appel des vues
   include(__DIR__.'/../views/templates/header.php');
   include(__DIR__.'/../views/editProfilUser.php');
   include(__DIR__.'/../views/templates/footer.php');