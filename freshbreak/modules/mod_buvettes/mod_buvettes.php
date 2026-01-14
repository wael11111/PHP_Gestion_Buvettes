<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_buvettes.php');



class ModBuvettes {
    private $controleur;

    public function __construct() {
        $this->controleur = new ContBuvettes();
    }

    public function exec() {

        $action = isset($_GET['action']) ? $_GET['action'] : 'liste';

        if (isset($_GET['bar_id'])) {
            $_SESSION['bar_id'] = intval($_GET['bar_id']);
        }

        switch ($action) {

            case 'stock':
                $this->controleur->afficherStock(isset($_SESSION['bar_id']) ? $_SESSION['bar_id'] : null);
                break;

            case 'bilan':
                $this->controleur->afficherBilan(isset($_SESSION['bar_id']) ? $_SESSION['bar_id'] : null);
                break;

            case 'payer':
                $this->controleur->payer(isset($_SESSION['bar_id']) ? $_SESSION['bar_id'] : null);
                break;

            case 'changer':
                unset($_SESSION['bar_id']);
                $this->controleur->liste();
                return;

            default:
                $this->controleur->liste();
                break;
        }

        if (isset($_SESSION['bar_id'])) {
            $this->controleur->menu();
        }
    }

    public function print_content() {
        return $this->controleur->print_content();
    }
}