<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_composant.php');

class Mod_composant {
    private $controller;

    public function __construct() {
        $this->controller = new Cont_composant();
    }

    public function exec() {

        $action = isset($_GET['action']) ? $_GET['action'] : '[default]';

        switch ($action) {
            case '[case]':
                break;

            default:
                echo "<p>Action inconnue.</p>";
                break;
        }
    }
}
?>