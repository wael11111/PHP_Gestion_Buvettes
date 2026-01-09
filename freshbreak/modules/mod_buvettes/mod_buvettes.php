<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_buvettes.php');



class mod_buvettes
{
    private $controleur;

    public function __construct() {
        $this->controleur = new cont_buvettes();
    }

    public function exec() {

        $action = isset($_GET['action']) ? $_GET['action'] : 'buvettes';

        switch ($action) {
            case 'stock':
                $this->controleur->form_inscription();
                break;

            case 'bilan':
                $this->controleur->form_connexion();
                break;

            case 'changer de buvette':
                $this->controleur->deconnexion();
                break;

            case 'payer':
                $this->controleur->deconnexion();
                break;


            default:
                echo "<p>Action inconnue.</p>";
                $this->controleur->form_connexion();
                break;
        }
    }

}