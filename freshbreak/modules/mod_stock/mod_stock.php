<?php
if (!defined('APP_SECURE')) die('Accès interdit.');

require_once('cont_stock.php');

class ModStock {
    private $controleur;

    public function __construct() {
        $this->controleur = new ContStock();
    }

    public function exec() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'afficher';

        switch ($action) {
            case 'afficher':
            default:
                $this->controleur->afficherStocks();
                break;
        }
    }
}
