<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../helpers/JWT.php');

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
         $user = new User();
         $user->setLastname($lastname);
         $user->setFirstname($firstname);
         $user->setEmail($email);
         $user->setPassword($password);
         $user->setAdress($adress);
         $user->setZipcode($zipcode);
         $user->setPhone($phone);
         $isAddedUser = $user->add();
         $id_user = $user->getId();
         $element = ['id' => $id_user, 'email' => $email];
         // $element['valid'] = time() + 60 * 15;
         $token = JWT::set($element);
         if ($user) {
            $to = $email;
            $subject = 'Validation de votre compte D-Tailing.';
            $message = 'Pour valider votre compte, cliquez sur le lien suivant : ' . $_SERVER['HTTP_ORIGIN'] . '/controllers/validateAccountCtrl.php?token=' . $token;
            mail($to, $subject, $message);
            SessionFlash::set('Votre compte a bien été créé, veuillez le validez via le lien envoyé par mail, pensez a vérifier vos spams si vous ne le trouvez pas dans vos mails.');
            header('Location: /controllers/connexionCtrl.php');
            exit;
         }
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
