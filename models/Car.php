<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/database.php');

// Class Car
class Car {
   // Attributs
      private $id;
      private $type;

   // setters
      public function setId($id) {
         $this->id = $id;
      }
      public function setType($type) {
         $this->type = $type;
      }

   // getters
      public function getId() {
         return $this->id;
      }
      public function getType() {
         return $this->type;
      }

   // Méthodes
      // Méthode pour ajouter un type de véhicule
         public function add() {
            $sth = Database::getInstance()->prepare('INSERT INTO `cars` (`Id_cars`, `Type`) VALUES (:id, :type)');
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':type', $this->type, PDO::PARAM_STR);
            if ($sth->execute()) {
               return true;
            }
            return false;
         }
      // Méthode pour récupérer tous les types de véhicules
         public static function displayAll() {
            $sth = Database::getInstance()->prepare('SELECT * FROM `cars`');
            if ($sth->execute()) {
               return ($sth->fetchAll(PDO::FETCH_OBJ));
            }
            return false;
         }
      // Méthode pour récupérer un type de véhicule
         public static function displayOne($id) {
            $sth = Database::getInstance()->prepare('SELECT * FROM `cars` WHERE `Id_cars` = :id');
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            if ($sth->execute()) {
               return ($sth->fetch(PDO::FETCH_OBJ));
            }
            return false;
         }
      // Méthode pour modifier un type de véhicule
         public function update() {
            $sth = Database::getInstance()->prepare('UPDATE `cars` SET `Type` = :type WHERE `Id_cars` = :id');
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->bindValue(':type', $this->type, PDO::PARAM_STR);
            if ($sth->execute()) {
               return true;
            }
            return false;
         }
      // Méthode pour supprimer un type de véhicule
         public function delete() {
            $sth = Database::getInstance()->prepare('DELETE FROM `cars` WHERE `Id_cars` = :id');
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            if ($sth->execute()) {
               return true;
            }
            return false;
         }
}