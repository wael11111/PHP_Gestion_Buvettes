<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_inbox.php');

class Mod_inbox {
    private $controller;

    public function __construct() {
        $this->controller = new Cont_inbox();
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