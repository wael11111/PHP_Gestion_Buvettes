<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_adhesion.php');
require_once('modele_adhesion.php');

class ContAdhesion {
    private $modele;
    private $vue;

    public function __construct() {
        $this->modele = new ModeleAdhesion();
        $this->vue = new VueAdhesion();
    }

    public function create_request() {

        if (
            empty($_POST['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
        ) {
            return;
        }

        $login = $_SESSION['login'] ?? null;
        $bar_id = $_POST['bar_id'] ?? null;

        if (!$login || !$bar_id) {
            $this->vue->message("Données invalides.");
            return;
        }

        if ($this->modele->estDejaMembreBuvette($login, $bar_id)) {
            $this->vue->message("Vous êtes déjà membre.");
            return;
        }

        $request_id = $this->modele->newAdhesionRequest($login, $bar_id);

        $gestionnaire = $this->modele->getGestionnaire($bar_id);
        $this->modele->new_message($gestionnaire, 1, $request_id);

        $this->vue->message("Demande envoyée.");
    }




    public function display_form() {
        $this->vue->confirmation($_SESSION['bar_id'] ?? null);
    }

    public function create_request_message_to_inbox($request_id,$bar_id) {
        $this->modele->new_message($this->modele->getGestionnaire($bar_id),1,$request_id);
    }

    public function handle_request() {
        if (isset($_GET['request_id'])) {
            $request_id = $_GET['request_id'];
            $request = $this->modele->get_request($request_id);
            $this->vue->display_request($request['login_request_user'],$request['request_content'],$request_id);
        }
    }

    public function accept_adhesion() {
        $request_id = $_GET['request_id'] ?? null;
        if (!$request_id) return;

        $request = $this->modele->get_request($request_id);

        $this->modele->ajouterMembreBuvette(
            $request['login_request_user'],
            $request['bar_associe'],
            'client'
        );

        $this->modele->finish_request($request_id);
    }

    public function decline_bar_creation() {
        if (isset($_GET['request_id'])) {
            $request_id = $_GET['request_id'];
            $request = $this->modele->get_request($request_id);
            $request_user = $request['login_request_user'];
            $bar_name = $request['request_content'];

            $this->modele->new_message($request_user,2,'0|'.$bar_name);
            $this->finish_tasks($request_id,$request_user,$bar_name);
        }
    }

    public function finish_tasks($request_id,$request_user,$bar_name) {
        $this->modele->delete_request($request_id);
        $this->modele->delete_msg($request_id);
//        unlink('./dossiers_creation_bar/'.$request_user.'_request_'.$bar_name.'_doc1.pdf');
//        unlink('./dossiers_creation_bar/'.$request_user.'_request_'.$bar_name.'_doc2.pdf');
//        unlink('./dossiers_creation_bar/'.$request_user.'_request_'.$bar_name.'_doc3.pdf');
        header('Location: index.php?module=inbox&action=show_inbox');
    }

    public function print_content() {
        return $this->vue->close_buffer();
    }
}
?>