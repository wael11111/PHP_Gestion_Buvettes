# Guide d’installation et d’exécution

Ce document explique comment installer et lancer l’application web de
**gestion de buvettes associatives**, développée en **PHP avec une architecture MVC**
et une **base de données MySQL**.

## Prérequis

- Serveur web local (Apache recommandé)
- PHP (version 8.x recommandée)
- MySQL ou MariaDB
- phpMyAdmin ou équivalent
- Git

Un environnement comme **XAMPP**, **WAMP** ou **MAMP** est suffisant.

## Récupération du projet

Cloner le dépôt GitHub :

```bash
git clone https://github.com/wael11111/PHP_Gestion_Buvettes.git
```

Placer ensuite le projet dans le dossier du serveur web, par exemple :

htdocs/
└── PHP_Gestion_Buvettes[SAE_WEB_WAEL_ADAM_LINO_MARIUS]/
    └── freshbreak/
        ├── index.php
        ├── modules/
        ├── composants/
        └── ...

Le dossier freshbreak/ correspond à la racine de l’application web.

## Configuration de la base de données

### Création de la base

- Ouvrir phpMyAdmin

- Créer une base de données (exemple) : `buvette`

### Import de la structure principale

- Importer le fichier SQL `bar_service.sql` fourni dans le dossier `bdscript/`

Ce fichier crée l’ensemble des tables principales de l’application.

### Création d’un utilisateur administrateur (optionnel)

Insérer manuellement un utilisateur dans la table utilisateur (exemple : login `admin`)

### Extension des fonctionnalités administrateur

- Importer ensuite le fichier `bdscript/admin_update.sql`

Ce script :

- ajoute les tables liées à l’administration,

- renomme la table stock en disponibilite,

- permet d’associer un utilisateur existant au rôle administrateur.

Après import, il est possible d’ajouter le compte admin via :

```sql
INSERT INTO admin (login) VALUES ('admin');
```

## Configuration de la connexion à la base

Dans le fichier de configuration de la base de données
(exemple : `config/db.php` ou équivalent), adapter les paramètres :

```php
$host = 'localhost';
$dbname = 'buvette';
$user = 'root';
$password = '';
```

Les valeurs peuvent varier selon l’environnement local.

## Lancement de l’application

1. Démarrer Apache et MySQL

2. Ouvrir un navigateur

3. Accéder à l’adresse suivante `http://localhost/NOM_DU_DOSSIER_PARENT/freshbreak/`

Exemple : `http://localhost/PHP_Gestion_Buvettes/freshbreak/`

L’application se lance automatiquement via `index.php`.

## Architecture du projet

L’application suit une architecture MVC :

- **Modèle** : gestion des données et accès à la base

- **Vue** : affichage

- **Contrôleur** : logique applicative

## Problèmes courants
### Page blanche

- Vérifier que PHP est bien activé

- Activer l’affichage des erreurs en développement

### Erreur de connexion à la base de données

- Vérifier les identifiants dans `db.php`

- Vérifier que MySQL est démarré

- Vérifier le nom de la base importée

### Accès refusé

- Vérifier les droits de l’utilisateur MySQL

- Vérifier le chemin du projet dans htdocs/ ou www/

## Informations complémentaires

- L’application fonctionne uniquement en local

- Aucune machine virtuelle n’est requise

- Le projet a été réalisé dans un cadre universitaire
