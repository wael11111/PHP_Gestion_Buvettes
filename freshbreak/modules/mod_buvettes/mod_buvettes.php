<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_buvettes.php');



class mod_buvettes
{
    private $controleur;

    public function __construct() {
        $this->controleur = new cont_buvettes();
    }

}