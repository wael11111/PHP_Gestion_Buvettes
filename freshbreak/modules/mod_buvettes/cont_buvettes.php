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
    }

    public function afficherBuvettes() {
        $buvettes = $this->modele->getAllBuvettes();

        ob_start();
        $this->vue->afficher($buvettes);
        $template_content = ob_get_clean();

        require('template.php');
    }
}
