<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('freshbreak/connexion.php');

class ModeleBuvette extends connexion {

    public function getAllBuvettes() {
        self::initConnexion();

        $req = self::$bdd->prepare("SELECT id, nom FROM bar");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
