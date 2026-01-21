<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('./vue_generique.php');

class VueAdhesion extends Vue_generique {

    public function confirmation($bar_id) {

        echo '<h2>Rejoindre une buvette</h2>';

        echo '<p>Souhaitez-vous envoyer une demande pour rejoindre cette buvette ?</p>';

        echo '
        <form method="post" action="index.php?module=adhesion&action=envoyer">

            <input type="hidden" name="csrf_token"
                   value="' . htmlspecialchars($_SESSION['csrf_token']) . '">

            <input type="hidden" name="bar_id"
                   value="' . intval($bar_id) . '">

            <button type="submit">Accepter</button>
            <a href="index.php?module=buvettes&action=liste">Annuler</a>

        </form>';
    }

    public function display_request($request_user,$bar_name,$request_id) {
        echo '<h2>Requête de création de bar</h2>
                  <p>'.$request_user.' souhaite rejoindre le bar '.$bar_name.'.</p>
                  <a href="index.php?module=creationBuvettes&action=accept_bar_creation&request_id='.$request_id.'">Accepter</a> 
                  <a href="index.php?module=creationBuvettes&action=decline_bar_creation&request_id='.$request_id.'">Refuser</a>';
    }

    public function message($texte) {
        echo '<p>' . htmlspecialchars($texte) . '</p>';
    }
}
