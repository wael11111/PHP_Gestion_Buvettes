<?php
if (!defined('APP_SECURE')) die('Accès interdit.');

class VueBuvettes {

    public function afficher($buvettes) {
        echo "<h2>Liste des buvettes</h2>";

        if (empty($buvettes)) {
            echo "<p>Aucune buvette enregistrée.</p>";
            return;
        }

        echo "<ul>";
        foreach ($buvettes as $b) {
            echo "<li>" . htmlspecialchars($b['nom']) . "</li>";
        }
        echo "</ul>";
    }
}
