<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once ('./vue_generique.php');

class VueCommande extends Vue_generique {
    public function __construct() {
        parent::__construct();
    }

    public function formClient($clients) {
        if (empty($clients)) {
            echo '<p>Aucun client disponible.</p>';
            return;
        }

        echo '<h2>Nouvelle commande</h2>
        <form method="post" action="index.php?module=commande&action=valider_client">
            <label>Sélectionner un client :</label><br>
            <select name="login_client" required>
                <option value="">-- Choisir --</option>';

        foreach ($clients as $c) {
            echo '<option value="' . htmlspecialchars($c['login']) . '">' . htmlspecialchars($c['login']) . ' (Solde : ' . $c['solde'] . '€)</option>';
        }

        echo '</select><br><br>
            <button type="submit">Continuer</button>
        </form>';
    }

    public function afficherPanier($produits, $panier, $client, $solde) {
        echo '<h2>Commande de ' . htmlspecialchars($client) . '</h2>
        <p>Solde disponible : ' . $solde . '€</p>';

        if (!empty($panier)) {
            $total = 0;
            echo '<h3>Panier actuel</h3><ul>';

            foreach ($panier as $p) {
                $st = $p['prix'] * $p['qte'];
                $total += $st;
                echo '<li>' . htmlspecialchars($p['nom']) . ' - ' . $p['prix'] . '€ x ' . $p['qte'] . ' = ' . $st . '€ <a href="index.php?module=commande&action=retirer&id=' . $p['id'] . '">[Retirer]</a></li>';
            }

            echo '</ul><p><strong>Total : ' . $total . '€</strong></p>';

            if ($solde >= $total) {
                echo '<a href="index.php?module=commande&action=valider"><button>Valider la commande</button></a> ';
            } else {
                echo '<p style="color:red;">Solde insuffisant pour valider</p>';
            }
        }

        echo '<h3>Ajouter un produit</h3>';

        if (empty($produits)) {
            echo '<p>Aucun produit en stock.</p>';
        } else {
            echo '<ul>';
            foreach ($produits as $p) {
                echo '<li>' . htmlspecialchars($p['nom_produit']) . ' - ' . $p['prix_vente'] . '€ (Stock : ' . $p['quantite'] . ')
                <form method="post" action="index.php?module=commande&action=ajouter" style="display:inline;">
                    <input type="hidden" name="id_produit" value="' . $p['id_produit'] . '">
                    <input type="number" name="quantite" value="1" min="1" max="' . $p['quantite'] . '" style="width:50px;">
                    <button type="submit">Ajouter</button>
                </form>
                </li>';
            }
            echo '</ul>';
        }

        echo '<br><a href="index.php?module=commande&action=annuler"><button>Annuler la commande</button></a>';
    }

    public function message($texte) {
        echo '<p>' . $texte . '</p>';
    }
}
?>