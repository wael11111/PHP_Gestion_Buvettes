<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_template.php');
require_once('modele_template.php');

class cont_template {
    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleSoldeRefill();
        $this->vue = new VueSoldeRefill();
    }
}
?>