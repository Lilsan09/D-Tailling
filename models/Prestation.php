<?php
   require_once(__DIR__ . '/../helpers/database.php');
   require_once(__DIR__ . '/../config/config.php');

   // Class Prestation
   class Prestation {
      // Attributs
         private $id;
         private $title;
         private $description;
         private $price;

      // Getters
         public function getId(){
            return $this->id;
         }
         public function gettitle(){
            return $this->title;
         }
         public function getDescription(){
            return $this->description;
         }
         public function getPrice(){
            return $this->price;
         }

      // Setters
         public function setId($id){
            $this->id = $id;
         }
         public function settitle($title){
            $this->title = $title;
         }
         public function setDescription($description){
            $this->description = $description;
         }
         public function setPrice($price){
            $this->price = $price;
         }

      // Méthodes
         // Méthode pour récupérer toutes les prestations
            public static function displayAll(){
               $sth = Database::getInstance()->prepare('SELECT * FROM `prestations`');
               if ($sth->execute()) {
                  return ($sth->fetchAll(PDO::FETCH_OBJ));
               }
               return false;
            }

         // Méthode pour récupérer une prestation
            public static function displayOne($id){
               $sth = Database::getInstance()->prepare('SELECT * FROM `prestations` WHERE `Id_prestations` = :id');
               $sth->bindValue(':id', $id, PDO::PARAM_INT);
               if ($sth->execute()) {
                  return ($sth->fetch(PDO::FETCH_OBJ));
               }
               return false;
            }

         // Méthode pour ajouter une prestation
            public function add(){
               $sth = Database::getInstance()->prepare('INSERT INTO `prestations` (`title`, `description`, `price`) VALUES (:title, :description, :price)');
               $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
               $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
               $sth->bindValue(':price', $this->price, PDO::PARAM_INT);
               if ($sth->execute()) {
                  $result = $sth->rowCount();
                  return ($result >= 1) ? true : false;
               }
            }

         // Methode pour supprimer une prestation
            public static function delete(INT $id){
               $sth = Database::getInstance()->prepare('DELETE FROM `prestations` WHERE `Id_prestations` = :id');
               $sth->bindValue(':id', $id, PDO::PARAM_INT);
               if ($sth->execute()) {
                  $result = $sth->rowCount();
                  return ($result >= 1) ? true : false;
               }
            }
         // Methode pour modifier une prestation
            public function update($id){
               $sth = Database::getInstance()->prepare('UPDATE `prestations` SET `title` = :title, `description` = :description, `price` = :price WHERE `Id_prestations` = :id');
               $sth->bindValue(':id', $id, PDO::PARAM_INT);
               $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
               $sth->bindValue(':description', $this->description, PDO::PARAM_STR);
               $sth->bindValue(':price', $this->price, PDO::PARAM_INT);
               if ($sth->execute()) {
                  $result = $sth->rowCount();
                  return ($result >= 1) ? true : false;
               }
            }

}