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
                <li><a href="index.php?module=creationBuvettes">Ajouter Votre Buvette</a></li>
               </ul>';
    } else {
        echo '<p><a href="index.php?module=connexion&action=connexion">Se connecter</a></p>';
    }
    echo '</header>';




    // Détermination du module
    $module = isset($_GET['module']) ? $_GET['module'] : 'error';

        switch ($module) {
            case 'creationBuvettes':
                require_once('modules/mod_creationBuvettes/mod_creationBuvettes.php');
                $mod = new mod_creationBuvettes();
                $mod->exec();
                break;

            case 'connexion':
                require_once('modules/mod_connexion/mod_connexion.php');
                $mod = new ModConnexion();
                $mod->exec();
                break;

            case 'buvettes':
                require_once('modules/mod_buvettes/mod_buvettes.php');
                $mod = new mod_buvettes();
                $mod->exec();
                break;



    }


?>

