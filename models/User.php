<?php
require_once(__DIR__.'/../config/config.php');
require_once(__DIR__.'/../helpers/database.php');
   // Class User
   class User {
      // Attributs
         private $id;
         private $lastname;
         private $firstname;
         private $email;
         private $password;
         private $adress;
         private $zipcode;
      
      // Getters
         public function getId() {
            return $this->id;
         }
         public function getLastname() {
            return $this->lastname;
         }
         public function getFirstname() {
            return $this->firstname;
         }
         public function getEmail() {
            return $this->email;
         }
         public function getPassword() {
            return $this->password;
         }
         public function getAdress() {
            return $this->adress;
         }
         public function getZipcode() {
            return $this->zipcode;
         }
         public function getPhone() {
            return $this->phone;
         }
      
      // Setters
         public function setId($id) {
            $this->id = $id;
         }
         public function setLastname($lastname) {
            $this->lastname = $lastname;
         }
         public function setFirstname($firstname) {
            $this->firstname = $firstname;
         }
         public function setEmail($email) {
            $this->email = $email;
         }
         public function setPassword($password) {
            $this->password = $password;
         }
         public function setAdress($adress) {
            $this->adress = $adress;
         }
         public function setZipcode($zipcode) {
            $this->zipcode = $zipcode;
         }
         public function setPhone($phone) {
            $this->phone = $phone;
         }
      

      // Methodes
         // Methodes pour ajouter un utilisateur
            public function add() {
               $sth = Database::getInstance()-> prepare('INSERT INTO `users` (`lastname`, `firstname`, `email`, `password`, `adress`, `zipcode`, `phone`) VALUES (:lastname, :firstname, :email, :password, :adress, :zipcode, :phone)');
               $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
               $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
               $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
               $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
               $sth->bindValue(':adress', $this->adress, PDO::PARAM_STR);
               $sth->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
               $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
               if ($sth->execute()) {
                  $result = $sth->rowCount();
                  return ($result >= 1) ? true : false;
               }
            }
         // Methode pour identifier un utilisateur
            public static function loginByMail($email) {
               $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `email` = :email');
               $sth->bindValue(':email', $email, PDO::PARAM_STR);
               if ($sth->execute()) {
                  $result = $sth->fetch(PDO::FETCH_OBJ);
                  if($result){
                     return $result;
                  }
               }
               return false;
            }
         // Methode pour afficher les informations d'un utilisateur
            public static function displayOne($id) {
               $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `Id_users` = :id');
               $sth->bindValue(':id', $id, PDO::PARAM_INT);
               if ($sth->execute()) {
                  $result = $sth->fetch(PDO::FETCH_OBJ);
                  if($result){
                     return $result;
                  }
               }
               return false;
            }

         // Methode pour modifier les informations d'un utilisateur
            public function modify($id) {
               $sth = Database::getInstance()->prepare('UPDATE `users` SET `lastname` = :lastname, `firstname` = :firstname, `email` = :email, `adress` = :adress, `zipcode` = :zipcode, `phone` = :phone WHERE `Id_users` = :id');
               $sth->bindValue(':id', $id, PDO::PARAM_INT);
               $sth->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
               $sth->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
               $sth->bindValue(':email', $this->email, PDO::PARAM_STR);
               $sth->bindValue(':adress', $this->adress, PDO::PARAM_STR);
               $sth->bindValue(':zipcode', $this->zipcode, PDO::PARAM_STR);
               $sth->bindValue(':phone', $this->phone, PDO::PARAM_STR);
               if ($sth->execute()) {
                  $result = $sth->rowCount();
                  return ($result >= 1) ? true : false;
               }
            }
         // Methode pour modifier le mot de passe d'un utilisateur
            // public function modifyPassword($id) {
            //    $sth = Database::getInstance()->prepare('UPDATE `users` SET `password` = :password WHERE `Id_users` = :id');
            //    $sth->bindValue(':id', $id, PDO::PARAM_INT);
            //    $sth->bindValue(':password', $this->password, PDO::PARAM_STR);
            //    if ($sth->execute()) {
            //       $result = $sth->rowCount();
            //       return ($result >= 1) ? true : false;
            //    }
            // }


   }