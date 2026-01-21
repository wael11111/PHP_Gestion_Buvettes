<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('cont_adhesion.php');

class ModAdhesion {
    private $controller;

    public function __construct() {
        $this->controller = new ContAdhesion();
    }

    public function exec() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'show_form';
        switch ($action) {
            case 'show_form':
                $this->controller->display_form();
                break;
            case 'create_request':
                $this->controller->create_request();
                break;
            case 'request_handling':
                if ($_SESSION['admin'])
                    $this->controller->handle_request();
                else
                    echo "<h1>NUH HUH</h1>";
                break;
            case 'accept_bar_creation':
                if ($_SESSION['admin'])
                    $this->controller->accept_adhesion();
                else
                    echo "<h1>NUH HUH</h1>";
                break;
            case 'decline_bar_creation':
                if ($_SESSION['admin'])
                    $this->controller->decline_bar_creation();
                else
                    echo "<h1>NUH HUH</h1>";
                break;

            default:
                echo "<p>Action inconnue.</p>";
                break;
        }
    }

    public function print_content() {
        return $this->controller->print_content();
    }
}
?>