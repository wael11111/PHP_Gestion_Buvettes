<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('./vue_generique.php');
class Vue_bilan extends Vue_Generique {
    public function __construct() {
        parent::__construct();
    }

    public function show_date_selection($date_min,$date_max) {
        echo '
        <h3>Bilan statistique du bar</h3>
            <p>Veuillez sélectionner une date de départ et de fin de l\'analyse statistique :</p>';
        $this->show_form($date_min,$date_max);
    }

    public function show_form($date_min,$date_max) {
        echo '
        <form action="index.php?module=bilan&action=summary_calculation" method="post">
                <input type="hidden" name="csrf_token" value="' . htmlspecialchars($_SESSION['csrf_token']) . '">
                <label>Date début</label>
                <input type="date" min="'.$date_min.'" max="'.$date_max.'" name="date_debut">
                <label>Date fin</label>
                <input type="date" min="'.$date_min.'" max="'.$date_max.'" name="date_fin">
                <button type="submit">Valider</button>
        </form>';
    }

    public function date_failure($date_min,$date_max) {
        echo '
        <p>La date de début est supérieur à la date de fin. La date de fin doit être supérieur à la date de début :</p>';
        $this->show_form($date_min,$date_max);
    }
}
?>