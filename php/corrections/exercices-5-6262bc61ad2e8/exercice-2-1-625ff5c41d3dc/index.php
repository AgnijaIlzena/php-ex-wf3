<?php

/**
 * Exercice #4
 */

// Exercice 1
$temperatures = [12, 34, -10, 32, 27, 15, 40, -1, 23, -4, 22];

#1 Moyenne des températures
// ceil() arrondi à l'unité supérieur
$moyenne = array_sum($temperatures) / count($temperatures);
echo 'La moyenne des températures est de '. ceil($moyenne);
echo '<hr>';

#2 Nombre d'éléments du tableau
echo count($temperatures);
echo '<hr>';

#3 Additionner toutes les valeurs
echo array_sum($temperatures);
echo '<hr>';

#4 Trier en ordre croissant
echo '<pre>';
var_dump($temperatures);
echo '</pre>';

// sort() : Tri croissant
// ksort() : Tri décroissant
sort($temperatures);

echo '<pre>';
var_dump($temperatures);
echo '</pre>';


// Exercice 2

#1
$clients = [
	'Particuliers' => [
		['Pierre', 43, 'Proctologue'],
		['Jacques', 27, 'Ceinture noire de Yoga'],
		['Nathalie', 25, 'Casseuse de pierre']
	],
	'Pros' => [
		['Jean-Pierre', 47, 'Assembleur de planches'],
		['Edgard', 67, 'Testeur de chemises']
	]
];

foreach ($clients as $client) {

	/* echo '<pre>';
	var_dump($client);
	echo '</pre>'; */

	foreach ($client as $fiche) {
		/* echo '<pre>';
		var_dump($fiche);
		echo '</pre>'; */

		if ($fiche[1] > 36) {
			echo $fiche[0] .' : plus de 36 ans !<br>';
		}
	}
}

echo '<hr>';

#2
// in_array(Valeur à rechercher, Tableau)
if(in_array('Jean-Pierre', $clients['Particuliers'][0]) || in_array('Jean-Pierre', $clients['Pros'][0])) {
	echo 'Le client existe';
}
else {
	echo 'Pas de Jean-Pierre';
}

echo '<hr>';

#3
echo $clients['Particuliers'][2][0] .' : '. $clients['Particuliers'][2][1] .' ans. '. $clients['Particuliers'][2][2];
echo '<hr>';

// Exercice 3

#1
$fiches = array(
	'Talus' => array(
		'prenom' => 'Jean',
		'age' => 24,
		'ville' => 'Reims'
	),
	'Penneflamme' => array(
		'prenom'=> 'Katty',
		'age' => 27,
		'ville' => 'Amiens'
	),
	'Bos' => array(
		'prenom'=> 'Harry',
		'age' => 43,
		'ville' => 'Brest'
	)
);

echo '<pre>';
print_r($fiches);
echo '</pre>';
echo '<hr>';

#2
foreach ($fiches as $key => $value) {
	echo '<strong>'. $key .'</strong>';
	echo '<ul>';
	echo '<li>'. $value['prenom'] .'</li>';
	echo '<li>'. $value['age'] .' ans</li>';
	echo '<li>'. $value['ville'] .'</li>';
	echo '</ul>';
}

?>
