<?php

// Appelle du fichier de configuration (là où on définit les constantes de connexion à la BDD)
require_once(__DIR__.'./../config/config.php');

class Database {
    private static $pdo;
    /**
     * Permet de se connecter à la base de données
     * @return [type]
     */
    public static function getInstance() {
        // Appel la base de donnée avec singleton
        if (is_null(self::$pdo)) {
            self::$pdo = new PDO(DSN, USER, PWD);
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$pdo;
    }
}
