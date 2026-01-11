<?php

class ModeleStock {

    public static function getStocks() {
        $pdo = connexion::getConnexion();

        $sql = "
            SELECT p.nom_produit, s.quantite
            FROM produit p
            JOIN stock s ON p.id_produit = s.id_produit
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
