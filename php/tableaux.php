<?php

/**
 * TABLEAUX
 */

 // Tableau indexé ou numéroté
 // $tableau = array();
 $tableau = ['Bonjour', 23, true, 34.5];

 echo $tableau[3];

 echo "<p>Bonjour Anna, vous me devez $tableau[3] </p>";
var_dump($tableau);

echo '<pre>';
var_dump($tableau);
echo '</pre>';

// Tableau associatif which is Tableau object in JS.

$prenom = "Ella";
$client = [
    'prenom' => $prenom,
    'nom' => 'West',
    'age' => 40 
];

echo $client['nom'] . ' ';
echo $client['prenom'];

// Tableau MULTIDIMENSIONNEL.

$clients = [
    ['id' => 1, 'nom' => 'Bella', 'prenom' => 'Karla'],
    ['id' => 2, 'nom' => 'Doe', 'prenom' => 'John']
];

echo $clients[1]['nom'];

echo '<pre>';
var_dump($clients);
echo '</pre>';