<?php

/**
 * Ajouter des donnés en BDD
 */

 require_once 'connexion.php';

// Use prepare() to add the data

$query = $db->prepare('INSERT INTO etudiants (nom, prenom, sexe, ville, age, arriver_le) VALUES (:nom, :prenom, :sexe, :ville, :age, :arriver_le)');
$query->bindValue(':nom', 'Lel');
$query->bindValue(':prenom', 'Anna');
$query->bindValue(':sexe', 'Femme');
$query->bindValue(':ville', 'Riga');
$query->bindValue(':age', 18, PDO::PARAM_INT);
$query->bindValue(':arriver_le', '2022/04/25');

$query->execute();