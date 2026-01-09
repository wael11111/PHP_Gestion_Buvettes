<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_buvettes.php');
require_once('modele_buvette.php');

class cont_buvettes
{
    private $vue;
    private $modele;
    public function __construct() {
        $this->vue = new vue_buvettes();
        $this->modele = new modele_buvette();

        // Démarre la session si ce n’est pas déjà fait
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


}