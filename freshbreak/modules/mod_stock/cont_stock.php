<?php
if (!defined('APP_SECURE')) die('Accès interdit.');

require_once('modele_stock.php');

class ContStock {

    public function afficherStocks() {
        $stocks = ModeleStock::getStocks();

        ob_start();
        require('vue_stock.php');
        $content = ob_get_clean();

        require('template.php');
    }
}
