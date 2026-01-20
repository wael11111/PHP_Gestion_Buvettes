<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('./vue_generique.php');

class VueStock extends Vue_generique {

    public function __construct() {
        parent::__construct();
    }

    public function afficher($stocks) {
        echo "<h2>Stocks</h2>";

        if (empty($stocks)) {
            echo "<p>Aucun stock disponible.</p>";
        } else {
            echo "<ul>";
            foreach ($stocks as $s) {
                echo "<li>"
                        . htmlspecialchars($s['nom_produit'])
                        . " : "
                        . (int)$s['quantite']
                        . "</li>";
            }
            echo "</ul>";
        }
    }

    public function formReapprovisionnement(array $produits, $message, $prixTotal) {

        echo "<h2>Réapprovisionnement</h2>";

        echo '<form method="post">';
        echo '<label>Produit</label><br>';
        echo '<select name="id_produit" required>';
        echo '<option value="">-- choisir --</option>';

        foreach ($produits as $p) {
            echo '<option value="'.$p['id_produit'].'">';
            echo htmlspecialchars($p['nom_produit']);
            echo '</option>';
        }

        echo '</select><br><br>';

        echo '<label>Quantité</label><br>';
        echo '<input type="number" name="quantite" min="1" required><br><br>';

        echo '<button type="submit">Réapprovisionner</button>';
        echo '</form>';

        if ($message) {
            echo '<p style="color:green;">'.$message;
            if ($prixTotal !== null) {
                echo ' – Prix total : '.number_format($prixTotal, 2).' €';
            }
            echo '</p>';
        }

        echo '<p style="font-size:0.9em">';
        echo 'Produit introuvable ? ';
        echo '<a href="index.php?module=produit&action=form_produit">';
        echo 'Ajouter un produit</a></p>';
    }

}
