<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('connexion.php');

class ModeleStock extends connexion {

    public static function getStockParBar($barId) {
        $req = self::$bdd->prepare("
        SELECT 
            p.nom_produit,
            d.quantite
        FROM disponibilite d
        JOIN produit p ON p.id_produit = d.id_produit
        WHERE d.bar_associe = :bar
        ORDER BY p.nom_produit
    ");
        $req->execute([
            ':bar' => $barId
        ]);

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
