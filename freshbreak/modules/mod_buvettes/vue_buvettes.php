<?php
if (!defined('APP_SECURE')) die('Accès interdit.');

class VueBuvettes
{
    public function afficher_buvette(array $tab) {

        if (empty($tab)) {
            echo '<p>Aucune buvette disponible.</p>';
            return;
        }

        echo '<form method="get" action="index.php">';
        echo '<input type="hidden" name="module" value="buvettes">';
        echo '<input type="hidden" name="action" value="liste">';


        echo '<label for="bar_id">Choisir une buvette :</label><br>';

        echo '<select name="bar_id" id="bar_id" required>';
        echo '<option value="">-- Sélectionner --</option>';
        foreach ($tab as $item) {
            echo '<option value="' . htmlspecialchars($item['id']) . '">';
            echo htmlspecialchars($item['nom']);
            echo '</option>';
        }

        echo '</select> ';

        echo '<button type="submit">Valider</button>';
        echo '</form>';
    }

    public function menu() {
        echo '<ul>
            <li><a href="index.php?module=buvettes&action=stock">stock</a></li>
            <li><a href="index.php?module=buvettes&action=bilan">bilan</a></li>
            <li><a href="index.php?module=buvettes&action=payer">payer</a></li>
        </ul>';
    }


}