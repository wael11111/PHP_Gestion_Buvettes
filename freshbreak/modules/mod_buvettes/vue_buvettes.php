<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once("./vue_generique.php");

class VueBuvettes extends Vue_generique {
    public function __construct() {
        parent::__construct();
    }

    public function choice(){
       echo '<a href="index.php?module=buvettes&action=liste">Choisir Bar</a>
|
<a href="index.php?module=creationBuvettes&action=show_form">Créer buvette</a>';
    }
    public function afficher_buvette(array $tab)
    {
        if (empty($tab)) {

            return;
        }


        echo '<h2> Bar rejoins </h2>';
        echo '<div class="liste-buvettes">';

        foreach ($tab as $item) {

            echo '<div class="buvette-card">';

            echo '<h3>' . htmlspecialchars($item['nom']) . '</h3>';

            echo '<a href="index.php?module=buvettes&bar_id='
                . (int)$item['id_bar']
                . '">
                Accéder à la buvette
              </a>';

            echo '</div>';
        }

        echo '</div>';
    }

    public function afficher_buvetteNon(array $tab)
    {
        if (empty($tab)) {

            return;
        }


        echo '<h2> Autre Bar </h2>';
        echo '<div class="liste-buvettes">';

        foreach ($tab as $item) {

            echo '<div class="buvette-card">';

            echo '<h3>' . htmlspecialchars($item['nom']) . '</h3>';

            echo '<a href="index.php?module=rejoindreBuvette&action=show_form&bar_id='
                . (int)$item['id_bar']
                . '">
                Rejoindre la buvette
              </a>';

            echo '</div>';
        }

        echo '</div>';
    }
    public function menu_client() {
        echo '<ul>
            <li><a href="index.php?module=buvettes&action=payer">payer</a></li>
        </ul>';
    }
    public function menu_gérant() {
        echo '<ul>
            <li><a href="index.php?module=produit&action=form_produit">Ajouter un produit</a></li>
            <li><a href="index.php?module=commande&action=selection_client">Nouvelle commande</a></li>
            <li><a href="index.php?module=stock&action=getStocks">stock</a></li>
            <li><a href="index.php?module=buvettes&action=bilan">bilan</a></li>
            <li><a href="index.php?module=buvettes&action=payer">payer</a></li>
            <li><a href="index.php?module=gestion_profils&action=ajoututilisateur">ajout utilisateur</a></li>
        </ul>';
    }
    public function menu_barman(){
        echo '<ul>
            <li><a href="index.php?module=commande&action=selection_client">Nouvelle commande</a></li>
            <li><a href="index.php?module=stock&action=getStocks">stock</a></li>
            <li><a href="index.php?module=buvettes&action=payer">payer</a></li>
            
        </ul>';
    }

    public function menu_admin(){
        echo '<ul>
            <li><a href="index.php?module=commande&action=selection_client">Nouvelle commande</a></li>
            <li><a href="index.php?module=stock&action=getStocks">stock</a></li>
            <li><a href="index.php?module=buvettes&action=bilan">bilan</a></li>
            <li><a href="index.php?module=buvettes&action=payer">payer</a></li>
            <li><a href="index.php?module=gestion_profils&action=ajoututilisateur">ajout utilisateur</a></li>
        </ul>';
    }


    public function afficher($buvettes) {
        echo "<h2>Liste des buvettes</h2>";

        if (empty($buvettes)) {
            echo "<p>Aucune buvette enregistrée.</p>";
            return;
        }

        echo "<ul>";
        foreach ($buvettes as $b) {
            echo "<li>" . htmlspecialchars($b['nom']) . "</li>";
        }
        echo "</ul>";
    }





}
