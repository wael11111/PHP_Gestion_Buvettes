<?php
if (!defined('APP_SECURE')) die('nuh uh');


class connexion {
	protected static $bdd;
	
	public function __construct(){}
	
	public static function initConnextion()  {
		self::$bdd =new PDO(
        'mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201628;charset=utf8',
        'dutinfopw201628',
        'bumuqasy');
       }
    }
?>
