<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('connexion.php');

class ModeleConnexion extends connexion {

    public function loginExiste($login) {
        $req = self::$bdd->prepare("SELECT COUNT(*) FROM utilsateurs WHERE login = :login");
        $req->bindParam(':login', $login);
        $req->execute();
        return $req->fetchColumn() > 0;
    }


public function ajouterUtilisateur($login, $mdp) {
   
    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT); 
    
    $req = self::$bdd->prepare("INSERT INTO utilsateurs (login, mdp) VALUES (:login, :mdp)");
    $req->bindParam(':login', $login);
    $req->bindParam(':mdp', $mdp_hash);
    $req->execute();
}


    public function verifierConnexion($login, $mdp) {
        $req = self::$bdd->prepare("SELECT mdp FROM utilsateurs WHERE login = :login");
        $req->bindParam(':login', $login);
        $req->execute();
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        var_dump($resultat);

        if ($resultat && password_verify($mdp, $resultat['mdp'])) {
            return true;
        }
        return false;
    }
}
?>

