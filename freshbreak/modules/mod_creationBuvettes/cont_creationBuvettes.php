<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('vue_creationBuvettes.php');
require_once('modele_creationBuvettes.php');

class cont_creationBuvettes
{
    private $vue;
    private $modele;

    public function __construct()
    {
        $this->vue = new vue_creationBuvettes();
        $this->modele = new modele_creationBuvettes();
    }

    public function form_ajout_bar()
    {
        if (isset($_POST['nom'])) {

            $nom = trim($_POST['nom']);

            if ($nom === '') {
                $this->vue->message("❌ Le nom de la buvette est obligatoire.");
                return;
            }

            if ($this->modele->nomexist($nom)) {
                $this->vue->message("❌ Cette buvette existe déjà.");
                return;
            }
                if ($this->modele->ajouterBuvette($nom)) {
                    $this->vue->message(" Buvette créée avec succès !");
                } else {
                    $this->vue->message(" Impossible de créer la buvette.");
                }


        } else {
            $this->vue->form_inscription();
        }
    }
}
