<?php
if (!defined('APP_SECURE')) die('Accès interdit.');

class vue_creationBuvettes
{
    public function form_inscription() {
        echo '
        <h2>Inscription</h2>
        <form method="post" action="index.php?module=connexion&action=inscription">
            <label>Nom Buvette :</label>
            <input type="text" name="nom" required><br>
            <button type="submit">S’inscrire</button>
        </form>';
    }



}