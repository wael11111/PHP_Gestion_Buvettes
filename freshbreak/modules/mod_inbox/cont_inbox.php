<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_inbox.php');
require_once('modele_inbox.php');

class Cont_inbox {
    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new Modele_inbox();
        $this->vue = new Vue_inbox();
    }
}
?>