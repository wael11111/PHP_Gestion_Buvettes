<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_creationBuvettes.php');



class mod_creationBuvettes
{
    private $controleur;

    public function __construct() {
        $this->controleur = new cont_creationBuvettes();
    }

    public function exec()
    {
        $this->controleur->form_ajout_bar();
    }

}