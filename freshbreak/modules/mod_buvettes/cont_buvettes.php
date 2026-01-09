<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_buvettes.php');
require_once('modele_buvette.php');

class ContBuvettes {
    private $vue;
    private $modele;
    public function __construct() {
        $this->vue = new VueBuvettes();
        $this->modele = new ModeleBuvette();

        // Démarre la session si ce n’est pas déjà fait
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


}