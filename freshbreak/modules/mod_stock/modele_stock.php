<?php
if (!defined('APP_SECURE')) die('Accès interdit.');

require_once('connexion.php');

class ModeleStock {

    public static function getStocks() {
        $pdo = connexion::initConnexion();

        $sql = "
            SELECT p.nom, s.quantite
            FROM stock s
            JOIN produit p ON s.id_produit = p.id
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
