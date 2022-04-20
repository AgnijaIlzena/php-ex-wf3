<?php


function nomDeLaFonction($prenom, $nom = null) {
    echo "Hello, $prenom !";
};

// function should be called after function is created!
nomDeLaFonction('Anna');
nomDeLaFonction('Ella');

function nomDeLaFonction2($prenom, $nom = null) {
    if ($prenom === 'Doe') {
        echo "<p>Hello $prenom $nom</p>";
    }
};

nomDeLaFonction2('Doe', 'Mein');


// !!!!!    iesniegtais arguments kaa Array. Arii Multidimens Array.

function beaucoupInfos(array $utilisateur, string|int $metier=null): int {
    //print_r($utilisateur);
    return $utilisateur['age'];
};

$array = [
    'prenom' => 'Maija',
    'age' => 56,
    'ville'=> 'Tarar'
];

$age = beaucoupInfos($array); 

// !!!!!    funkcija kas neko neatgriezh
/// viss kas atrodas peec return funkcijaa, vairs nestraadaa.

// Typage

 