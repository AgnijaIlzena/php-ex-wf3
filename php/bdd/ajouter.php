<?php

/**
 * Ajouter des donnés en BDD
 */

 require_once 'connexion.php';

// Use prepare() to add the data


$nom = htmlspecialchars(strip_tags($_POST['nom']));
$prenom = htmlspecialchars(strip_tags($_POST['prenom']));
$sexe = htmlspecialchars(strip_tags($_POST['sexe']));
$ville = htmlspecialchars(strip_tags($_POST['ville']));
$age = htmlspecialchars(strip_tags($_POST['age']));

$query = $db->prepare('INSERT INTO etudiants (nom, prenom, sexe, ville, age, arriver_le) VALUES (:nom, :prenom, :sexe, :ville, :age, NOW())');

$query->bindValue(':nom', $nom);
$query->bindValue(':prenom', $prenom);
$query->bindValue(':sexe', $sexe);
$query->bindValue(':ville', $ville);
$query->bindValue(':age', $age, PDO::PARAM_INT);

$query->execute();

header("Location: index.php?sucess");