<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once("./vue_generique.php");

class Vue_inbox extends Vue_generique {
    public function __construct() {
        parent::__construct();
    }

    public function show_number_msg($nb_msg) {
        echo "<p>Vous avez $nb_msg message(s).</p> ";
    }

    public function show_bar_creation_msg($request_info) {
        $request_arguments = explode("|",$request_info);
        if ($request_arguments[0] == '1') {
            $decision = 'accepté';
            $explanation = 'Vous pourrez retrouver votre bar'.$request_arguments[1].' dans le menu déroulant de sélection.';
        }
        else {
            $decision = 'refusé';
            $explanation = 'Les fichiers fournis ne sont pas conforme à la réglementation. Refaites votre demande en les corrigeant ou adressez vous à notre support s\'il s\'agit d\'une erreur.';
        }

        echo "<div>
                <p>La demande de création pour votre buvette  a été $decision. $explanation</p>
            </div>";
    }

    public function show_admin_bar_creation_request($request_id) {
        echo '<div>
                <p>Vous avez une requête de création de bar à <a href="index.php?module=creationBuvettes&action=request_handling&request_id='.$request_id.'">traiter</a>.</p>
            </div>';
    }

    public function show_payment_confirmation($request_info) {
        echo "<div>
                <p>En dev</p>
            </div>";
    }
}
?>