<?php
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/../helpers/database.php');
// Class User
class User
{
   // Attributs
   private $id;
   private $lastname;
   private $firstname;
   private $email;
   private $password;
   private $adress;
   private $zipcode;

   // Getters
   public function getId()
   {
      return $this->id;
   }
   public function getLastname()
   {
      return $this->lastname;
   }
   public function getFirstname()
   {
      return $this->firstname;
   }
   public function getEmail()
   {
      return $this->email;
   }
   public function getPassword()
   {
      return $this->password;
   }
   public function getAdress()
   {
      return $this->adress;
   }
   public function getZipcode()
   {
      return $this->zipcode;
   }
   public function getPhone()
   {
      return $this->phone;
   }

   // Setters
   public function setId($id)
   {
      $this->id = $id;
   }
   public function setLastname($lastname)
   {
      $this->lastname = $lastname;
   }
   public function setFirstname($firstname)
   {
      $this->firstname = $firstname;
   }
   public function setEmail($email)
   {
      $this->email = $email;
   }
   public function setPassword($password)
   {
      $this->password = $password;
   }
   public function setAdress($adress)
   {
      $this->adress = $adress;
   }
   public function setZipcode($zipcode)
   {
      $this->zipcode = $zipcode;
   }
   public function setPhone($phone)
   {
      $this->phone = $phone;
   }


   // Methodes
      // Methodes pour ajouter un utilisateur
         public function add(){
            $sth = Database::getInstance()->prepare('INSERT INTO `users` (`lastname`, `firstname`, `email`, `password`, `adress`, `zipcode`, `phone`) VALUES (:lastname, :firstname, :email, :password, :adress, :zipcode, :phone)');
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
         public static function loginByMail($email){
            $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `email` = :email');
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            if ($sth->execute()) {
               $result = $sth->fetch(PDO::FETCH_OBJ);
               if ($result) {
                  return $result;
               }
            }
            return false;
         }

      // Methode pour afficher les informations d'un utilisateur
         public static function displayOne($id)
         {
            $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `Id_users` = :id');
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            if ($sth->execute()) {
               $result = $sth->fetch(PDO::FETCH_OBJ);
               if ($result) {
                  return $result;
               }
            }
            return false;
         }

      // Methode pour modifier les informations d'un utilisateur
         public function modify($id)
         {
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
      // Methode pour supprimer un utilisateur
         public static function delete($id)
         {
            $sth = Database::getInstance()->prepare('DELETE FROM `users` WHERE `Id_users` = :id');
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            if ($sth->execute()) {
               $result = $sth->rowCount();
               return ($result >= 1) ? true : false;
            }
         }
      // Methode pour verifier si l'adresse mail existe deja
         public static function checkEmail($email)
         {
            $sth = Database::getInstance()->prepare('SELECT * FROM `users` WHERE `email` = :email');
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            if ($sth->execute()) {
               $result = $sth->fetch(PDO::FETCH_OBJ);
               if ($result) {
                  return $result;
               }
            }
            return false;
         }

      // Methode pour compter le nombre d'éléments au total selon la recherche
         public static function count($search)
         {
            $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS `nbUsers` FROM `users` WHERE `lastname` LIKE :search OR `firstname` LIKE :search OR `email` LIKE :search OR `adress` LIKE :search OR `zipcode` LIKE :search OR `phone` LIKE :search');
            $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            if ($sth->execute()) {
               $result = $sth->fetch(PDO::FETCH_OBJ);
               if ($result) {
                  return $result->nbUsers;
               }
            }
            return false;
         }

      // Methode pour afficher les utilisateurs selon la recherche
         public static function displayAll(?string $search = '', int $limit = null, int $offset = 0): array {
            // On stocke une instance de la classe PDO dans une variable
            $pdo = Database::getInstance();
            // On prépare la requête SQL
            $sql = 'SELECT * FROM `users` WHERE `lastname` LIKE :search OR `firstname` LIKE :search OR `email` LIKE :search';
            
            if (!is_null($limit)) {
               $sql .= ' LIMIT :limit OFFSET :offset';
            }

            $sql .= ';';

            // On prépare la requête
            $sth = Database::getInstance()->prepare($sql);

            // On associe le marqueur nominatif à la valeur de search
            $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

            // On associe les marqueurs nominatifs aux valeurs de offset et limit
            if (!is_null($limit)) {
               $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
               $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
            }

            if ($sth->execute()) {
               return ($sth->fetchAll(PDO::FETCH_OBJ));
            } else {
               return [];
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
