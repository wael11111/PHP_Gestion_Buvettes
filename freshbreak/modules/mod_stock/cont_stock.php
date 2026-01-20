<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_stock.php');
require_once('modele_stock.php');

class ContStock {
    private $vue;

    public function __construct() {
        $this->vue = new VueStock();
    }

    public function afficher($barId) {
        if ($barId === null) {
            $this->vue->afficher([]);
            return;
        }

        $stocks = ModeleStock::getStockParBar($barId);
        $this->vue->afficher($stocks);
    }

    public function getContent() {
        return $this->vue->close_buffer();
    }
}
