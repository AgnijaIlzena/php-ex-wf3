<?php

/** EX.1 #1
 * Créer un tableau numéroté « $temperatures » content les éléments suivants :
 *  12, 34, -10, 32, 27, 15, 40, -1, 23, -4, 22
 **/

$temperatures = [12, 34, -10, 32, 27, 15, 40, -1, 23, -4, 22];

// Ex1 #2   •Afficher la moyenne des températures dans une phrase;
$avTemperatures = round(array_sum($temperatures) / count($temperatures));
echo "La moyenne temperature est $avTemperatures";
echo '<br>';

// Ex1 #3  • Afficher le nombre d’éléments contenus dans le tableau.
echo $elements = count($temperatures);
echo '<br>';

// Ex1 #3 Additionner l’ensemble des températures et afficher le résultat.
echo $sumElements = array_sum($temperatures);
echo '<br>';

// Ex1 #4 Trier les valeurs du tableau en ordre croissant.
sort($temperatures);
foreach ($temperatures as $key) {
    echo $key . ' ; ';
}
echo '<br>';

// Ex2 #1
$myArray = [
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


$clients = array(
    'Particuliers' => array(
        array('Pierre', 43, 'Proctologue'),
        array('Jacques', 27, 'Ceinture noire de Yoga'),
        array('Nathalie', 25, 'Casseuse de pierre')
    ),
    'Pros' => array(
        array('Jean-Pierre', 47, 'Assembleur de planches'),
        array('Edgard', 67, 'Testeur de chemises')
    )
);

echo '<br>';

// Ex2 #2 • Afficher seulement les clients ayant les plus de 36 ans.

echo '<ul>';
foreach ($clients as $key => $value) {
    echo '<li>';

    foreach ($value as $k) {

        foreach ($k as $cle => $v) {

            if ($k[1] > 36) {
                echo "$v ";
            }
        }
        echo '</li>';
    }
}
echo '</ul>';
echo '<br>';
// Ex2 #3 Sans boucle, vérifier si le client « Jean-Pierre » existe et afficher une phrase selon s’il existe ou
// non.

if ($clients['Pros'][0][0] === 'Jean-Pierre') {
    echo "Yes, Jean-Pierre exists!";
}
echo '<br>';

// Ex2 #3 • Sans boucle, afficher dans une phrase, les informations de « Nathalie ».

echo "{$clients['Particuliers'][2][0]} is {$clients['Particuliers'][2][1]} years old and she is \" {$clients['Particuliers'][2][2]} \" .";


// Ex3 #1  Créer un tableau multidimensionnel associatif dont les clés sont des noms de personne et les
//valeurs des tableaux contenant le prénom, l’âge et la ville de résidence.
//Afficher le tableau avec le fonction PHP « print_r() ».

$persons = [
    'Por' => ['Anda', 28, 'Riga' ],
    'Minka' => ['Maija', 15, 'London'],
    'Fab' => ['Jordan', 43, 'Prague'], 
    'Robez'=> ['Kay', 67, 'Moscow']
];