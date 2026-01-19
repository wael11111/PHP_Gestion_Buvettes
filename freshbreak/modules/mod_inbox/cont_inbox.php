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

    public function show_inbox() {
        $tab_messages = $this->modele->getMessages($_SESSION['login']);
        $this->vue->show_number_msg(count($tab_messages));

        foreach ($tab_messages as $message) {
            $this->show_message($message);
        }
    }
    //TODO:ptet le cleaning des msgs

    public function show_message($message) {
        $message_type = $message['message_type'];
        $message_content = $message['msg_arguments'];

        switch ($message_type) {
            case 0:
                $this->vue->show_payment_confirmation($message_content);
                break;
            case 1:
                $this->vue->show_admin_bar_creation_request($message_content);
                break;
            case 2:
                $this->vue->show_bar_creation_msg($message_content);
                break;
        }
    }

    public function print_content() {
        return $this->vue->close_buffer();
    }
}
?>