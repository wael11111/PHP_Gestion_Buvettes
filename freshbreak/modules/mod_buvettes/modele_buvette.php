<?php
if (!defined('APP_SECURE')) die('Accès interdit.');
require_once('connexion.php');


class ModeleBuvette extends connexion
{

    public function getJoinedListe(string $login)
    {
        $sql = '
        SELECT *
        FROM bar
        WHERE id_bar IN (
            SELECT bar_associe
            FROM role
            WHERE login_utilisateur = :login
        )
    ';

        $stmt = self::$bdd->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public function getNonJoinedListe(string $login)
    {
        $sql = '
        SELECT *
        FROM bar
        WHERE id_bar NOT IN (
            SELECT bar_associe
            FROM role
            WHERE login_utilisateur = :login
        )
    ';

        $stmt = self::$bdd->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    public function getRole($login_utilisateur){
        $sql = 'SELECT role_bar 
        FROM role 
        WHERE login_utilisateur = :login_utilisateur';

        $stmt = self::$bdd->prepare($sql);
        $stmt->bindValue(':login_utilisateur', $login_utilisateur);
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function barRejoins($login, $id_bar)
    {
        $sql = 'Select bar_associe from role where login_utilisateur = :login and bar_associe = :id_bar';
        $stmt = self::$bdd->prepare($sql);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':id_bar', $id_bar);
        $stmt->execute();
        if ( !$stmt->fetchColumn()) {
            return $stmt->fetchColumn();
        }
        return true;

            }

}
