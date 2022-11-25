<?php
   require_once(__DIR__.'/../config/config.php');
   require_once(__DIR__.'/../models/User.php');
   
   try {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //////////////////////////// NETTOYAGE//////////////////////////
      $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
      $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
      $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
      $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);
      $password = filter_input(INPUT_POST, 'password');
      $confirmpassword = filter_input(INPUT_POST, 'confirmPassword');
      $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_SPECIAL_CHARS);
      $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
      ////////////////// NOM ///////////////////
         if (empty($lastname)) {
            $errors['lastname'] = 'Champ obligatoire';
         } else {
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            if ($isOk == false) {
               $errors['lastname'] = 'Ce nom n\'est pas conforme';
            }
         }

      ///////////////// PRÉNOM //////////////////
         if (empty($firstname)) {
            $errors['firstname'] = 'Champ obligatoire';
         } else {
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_NO_NUMBER . '/')));
            if ($isOk == false) {
               $errors['firstname'] = 'Ce prénom n\'est pas conforme';
            }
         }

      ///////////////// MAIL //////////////////
         if (empty($email)) {
            $errors['email'] = 'Champ obligatoire';
         } else {
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL, array("options" => array("regexp" => '/' . REGEX_EMAIL . '/')));
            if (!$isOk) {
               $errors['email'] = 'Adresse mail non valide';
            }
            if (User::checkEmail($email)) {
               $errors['email'] = 'Cette adresse mail est déjà utilisée';
            }
         }

      ///////////////// ADRESS //////////////////
         if (empty($adress)) {
            $errors['adress'] = 'Champ obligatoire';
         }

      ///////////////// ZIPCODE //////////////////
         if (empty($zipcode)) {
               $errors['zipcode'] = 'Champ obligatoire';
            } else {
               $isOk = filter_var($zipcode, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
               if ($isOk == false) {
                  $errors['zipcode'] = 'Code postal non valide';
               }
            }
      ///////////////// MOT DE PASSE-CONFIRM PASSWORD //////////////////
         if (empty($password)) {
            $errors['password'] = 'Champ obligatoire';
         }
         if (empty($confirmpassword)) {
            $errors['confirmpassword'] = 'Champ obligatoire';
         }
         if ($password != $confirmpassword) {
            $errors['testPassword'] = 'Les mots de passe ne correspondent pas';
         }
         $password = password_hash($password, PASSWORD_DEFAULT);
         
      
         if (empty($errors)) {
         $user = New User();
         $user->setLastname($lastname);
         $user->setFirstname($firstname);
         $user->setEmail($email);
         $user->setPassword($password);
         $user->setAdress($adress);
         $user->setZipcode($zipcode);
         $user->setPhone($phone);
         $isAddedUser = $user->add();
         header('Location: /controllers/homeCtrl.php');
         exit();
      }

   }
   } catch (PDOException $e) {
      die('Erreur : ' . $e->getMessage());
   }
   // FINIR L AJOUT D UN USER DANS LA BDD!!!!!!
   
   include(__DIR__ . '/../views/templates/header.php');
   include(__DIR__ . '/../views/inscription.php');
   include(__DIR__ . '/../views/templates/footer.php');
