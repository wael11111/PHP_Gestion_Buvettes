<?php
// DÉMARRER LA SESSION EN PREMIER — absolument tout en haut
session_start();

define('APP_SECURE', true);
require_once('connexion.php');

// Initialisation de la connexion à la BDD
connexion::initConnextion();

echo '<header>';
echo '<h1>Freshbreak</h1>';

// Vérifie si un utilisateur est connecté
if (isset($_SESSION['login'])) {
    echo '<p>Connecté sous <b>' . htmlspecialchars($_SESSION['login']) . '</b> | Solde : ' . $_SESSION['solde'] . '€ ';
    echo '| <a href="index.php?module=solde_refill&action=form">Recharger le solde</a>';
    echo '| <a href="index.php?module=connexion&action=deconnexion">Se déconnecter</a></p>';
    echo '<ul>
            <li><a href="index.php?module=buvettes">Buvettes</a></li>
           </ul>';
} else {
    echo '<p><a href="index.php?module=connexion&action=connexion">Se connecter</a></p>';
}
echo '</header>';




// Détermination du module
$module = isset($_GET['module']) ? $_GET['module'] : 'error';

switch ($module) {
    case 'joueurs':
        require_once('modules/mod_joueur/mod_joueurs.php');
        $mod = new ModJoueurs();
        break;

    case 'connexion':
        require_once('modules/mod_connexion/mod_connexion.php');
        $mod = new ModConnexion();
        break;

    case 'equipes':
        require_once('modules/mod_equipes/mod_equipes.php');
        $mod = new ModEquipes();
        break;

    case 'solde_refill':
        require_once ('modules/mod_solde_refill/mod_solde_refill.php');
        $mod = new ModSoldeRefill();
        break;

    default:
        die("Module inconnu");
}

$mod->exec();
?>

