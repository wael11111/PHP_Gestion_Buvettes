<?php

require_once 'modules/mod_stock/modele_stock.php';

class ModStock {

    public function exec() {
        $stocks = ModeleStock::getStocks();
        require 'modules/mod_stock/vue_stock.php';
    }
}
