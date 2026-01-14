<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_buvettes.php');

class ModBuvettes {
    private $controleur;

    public function __construct() {
        $this->controleur = new ContBuvettes();
    }

    public function exec() {
        $this->controleur->afficherBuvettes();
    }
}
