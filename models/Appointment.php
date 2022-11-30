<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/database.php');

class Appointment
{
   private $id;
   private $dateHour;
   private $id_users;
   private $id_prestations;
   private $id_cars;

   // Getters
      public function getId()
      {
         return $this->id;
      }

      public function getDateHour()
      {
         return $this->dateHour;
      }

      public function getId_users()
      {
         return $this->id_users;
      }

      public function getId_prestations()
      {
         return $this->id_prestations;
      }
      public function getId_cars()
      {
         return $this->id_cars;
      }
   // Setters
      public function setId($id)
      {
         $this->id = $id;
      }

      public function setDateHour($dateHour)
      {
         $this->dateHour = $dateHour;
      }

      public function setId_users($id_users)
      {
         $this->id_users = $id_users;
      }

      public function setId_prestations($id_prestations)
      {
         $this->id_prestations = $id_prestations;
      }
      public function setId_cars($id_cars)
      {
         $this->id_cars = $id_cars;
      }

   // Méthodes
      // Méthode pour ajouter un rendez-vous
         public function add(){
            $sth = Database::getInstance()->prepare('INSERT INTO `appointments` (dateHour, Id_users, Id_prestations, Id_cars) VALUES (:dateHour, :id_users, :id_prestations, :id_cars)');
            $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
            $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
            $sth->bindValue(':id_prestations', $this->id_prestations, PDO::PARAM_INT);
            $sth->bindValue(':id_cars', $this->id_cars, PDO::PARAM_INT);
            $sth->execute();
         }
      // Méthode pour supprimer un rendez-vous
         public function delete(){
            $sth = Database::getInstance()->prepare('DELETE FROM `appointments` WHERE `id` = :id');
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->execute();
         }
      // Méthode pour modifier un rendez-vous
         public function modify(){
            $sth = Database::getInstance()->prepare('UPDATE `appointments` SET `dateHour` = :dateHour, `Id_users` = :id_users, `Id_prestations` = :id_prestations, `Id_cars` = :id_cars WHERE `id` = :id');
            $sth->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
            $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
            $sth->bindValue(':id_prestations', $this->id_prestations, PDO::PARAM_INT);
            $sth->bindValue(':id_cars', $this->id_cars, PDO::PARAM_INT);
            $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
            $sth->execute();
         }
      // Méthode pour afficher tout les rendez-vous trier par date (dashboard admin)
         public static function displayAllByDate(){
            $sth = Database::getInstance()->prepare('SELECT `c`.`type`, `p`.`title`, `a`.`datehour`, CONCAT(`u`.`lastname`," ", `u`.`firstname`) AS `users` FROM `users` AS `u`, `appointments` AS `a`, `cars` AS `c`, `prestations` AS `p` WHERE `a`.`Id_cars` = `c`.`Id_cars` AND `a`.`Id_prestations` = `p`.`Id_prestations` AND `a`.`Id_users` = `u`.`Id_users` ORDER BY `a`.`dateHour` ASC;');
            $sth->execute();
            $appointments = $sth->fetchAll(PDO::FETCH_OBJ);
            return $appointments;
         }
      // Méthode pour afficher un rendez-vous
         public static function displayOne($id){
            $sth = Database::getInstance()->prepare('SELECT * FROM `appointments` WHERE `id` = :id');
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $appointment = $sth->fetch(PDO::FETCH_ASSOC);
            return $appointment;
         }
      // Méthode pour afficher tout les rendez-vous d'un utilisateur trier par date (coté user)
         public static function displayAllByUser($id_users){
            $sth = Database::getInstance()->prepare('SELECT `c`.`type`, `p`.`title`, `a`.`datehour` FROM `appointments` AS `a`, `cars` AS `c`, `prestations` AS `p` WHERE `a`.`Id_users` = :id_users AND `a`.`Id_cars` = `c`.`Id_cars` AND `a`.`Id_prestations` = `p`.`Id_prestations` ORDER BY `a`.`dateHour` ASC;');
            $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
            $sth->execute();
            $appointments = $sth->fetchAll(PDO::FETCH_OBJ);
            return $appointments;
         }
      // Méthode pour afficher tout les rendez-vous d'un utilisateur
         // public static function displayAllByUser($id_users){
         //    $sth = Database::getInstance()->prepare('SELECT * FROM `appointments` WHERE `Id_users` = :id_users');
         //    $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
         //    $sth->execute();
         //    $appointments = $sth->fetchAll(PDO::FETCH_OBJ);
         //    return $appointments;
         // }
      
}