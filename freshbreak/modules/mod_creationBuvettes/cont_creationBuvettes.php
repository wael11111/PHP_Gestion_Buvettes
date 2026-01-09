<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_creationBuvettes.php');
require_once('modele_creationBuvettes.php');

class cont_creationBuvettes
{
    private $vue;
    private $modele;
    public function __construct() {
        $this->vue = new vue_creationBuvettes();
        $this->modele = new modele_creationBuvettes();

        // Démarre la session si ce n’est pas déjà fait
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function form_ajout_bar() {
        if (!empty($_POST['nom']) ) {
            $nom = $_POST['nom'];


            if ($this->modele->nomexist($nom)) {
                $this->vue->message("❌ Cette buvette existe déjà.");
            } else {
                $this->modele->ajouterBuvette($nom);
                $this->vue->message("✅ Inscription réussie !");

            }
        } else {
            $this->vue->form_inscription();
        }
    }

}