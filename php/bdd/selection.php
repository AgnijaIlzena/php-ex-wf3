<?php

/**
 * Sélection de données en BDD
 */

 require_once 'connexion.php';

 //query();
 // execute directement la requete SQL passée en paramètre.

 $query = $db->query('SELECT * FROM etudiants');  //returns the info in $query;
 $etudiants = $query->fetchAll(); // returns all in $etudiants after go search all by fetchAll();


//  echo '<pre>';
//  print_r($etudiants);
//  echo '</pre>';

foreach($etudiants as $etudiant){
   echo "<p>L'etudiant se nomme {$etudiant['prenom']} {$etudiant['nom']};</p>";
}