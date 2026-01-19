<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('connexion.php');

class Modele_inbox extends connexion {
    public function getMessages($login) {
        $req = self::$bdd->prepare("SELECT message_type,msg_arguments FROM inbox WHERE user_login = :login");
        $req->bindParam(':login', $login);
        $req->execute();
        return $req->fetchAll();
    }
}
?>