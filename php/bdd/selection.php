<?php

/**
 * Sélection de données en BDD
 */

 require_once 'connexion.php';

 //query();
 // execute directement la requete SQL passée en paramètre.

 $query = $db->query('SELECT * FROM etudiants');  //returns the info in $query;
 $etudiants = $query->fetchAll(); // returns all in $etudiants after go search all by fetchAll();

 // boocle necessaire pour lire resultat ammené par fetchAll();
 foreach($etudiants as $etudiant){
    echo "<p>L'etudiant se nomme {$etudiant['prenom']} {$etudiant['nom']};</p>";
 }

//no boocle necessaire pour lire la resultat de fetch();
 $etudiant = $query->fetch();
 echo "<p>L'etudiant se nomme {$etudiant['prenom']} {$etudiant['nom']};</p>";

//---------------------------------------------------------------------------------------
 // prepare();

 $prenom = 'Marc';  // new created variable with students name;
 //create varible de SQL :firstName
 // and after we clean this prepared  variable, so that injections are not possible
 // when found this sql variable, put second argument meaning what to use instead of it.
 // after execute celle ci
 // after fetchAll() or fetch().
 $query = $db->prepare('SELECT * FROM etudiants WHERE prenom = :firstName');
 $query->bindValue(':firstName', $prenom);
 $query->execute();

 $etudiants = $query->fetchAll();

 echo '<pre>';
 print_r($etudiants);
 echo '</pre>';