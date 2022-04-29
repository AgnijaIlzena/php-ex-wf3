<?php

/**
 * Connexion à la base de données
 */

 // Localisation de la BDD
 const DB_HOST = 'localhost';

 // Nom d'utilisator
 const DB_USER = 'root';

 // mot de pass
 const DB_PASS = 'developpe';

 // Nom de la base de données
 const DB_NAME = 'blog';

 //creer connexion a la base de donnée
 // PDO => PHP data object

 $db = new PDO('mysql:host=' . DB_HOST .';dbname=' .DB_NAME, DB_USER, DB_PASS, 
 [
     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
 ]);
// with which system want to work: mysql
// where is it located: host = 
// etc
// option PDO =>
//1) gestion des errors: PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING   (cle - valeur);
//2) gestion du jeu de  caractères:  PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//3) Choix des retours des résultats