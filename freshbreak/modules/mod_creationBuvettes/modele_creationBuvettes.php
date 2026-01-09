<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('connexion.php');


class modele_creationBuvettes extends connexion
{
    public function nomexist($nom) {
        $req = self::$bdd->prepare("SELECT COUNT(*) FROM bar WHERE nom = :nom");
        $req->bindParam(':nom', $nom);
        $req->execute();
        return $req->fetchColumn() > 0;
    }

    public function ajouterBuvette($nom) {

        $req = self::$bdd->prepare("INSERT INTO bar (nom) VALUES (:nom)");
        $req->bindParam(':nom', $nom);


        $req->execute();
    }

}
