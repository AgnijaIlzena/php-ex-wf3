<?php

// ex1 #1  Créer dans un fichier « calcul.php » une fonction calculAire() qui retourne l'aire
// d'un rectangle en prenant pour paramètre la longueur et la largeur. 
// Dans un fichier « index.php », récupérer la fonction calculAire() définie dans
// « calcul.php » et exécuter la. 

function calculAire(int|float $longeur, int|float $largeur): int|float
{
    return $longeur * $largeur;
}


//echo $air;


// ex2 #1  Créer un tableau PHP contenant les éléments suivants : test, 34, bonjour,
// marine, brouette. 

$tableau = ['test', 34, 'bonjour', 'marine', 'brouette'];


// ex2 #2  Grâce à une fonction, vérifier si l’élément « bonjour » est bien dans le tableau.
//Si oui, afficher un message en conséquence. 

function isIn(array $tableau, int|string $intrus): string
{
    if (in_array($intrus, $tableau)) {
        return "$intrus is in this array";
    }
}

$intrus = 'bonjour';
$value = isIn($tableau, $intrus);
echo $value;

// ex3 #1   . Créer une fonction nommée « magic8Ball() ». Cette fonction prend en
// argument une question (chaine de caractères). 
// Le retour de valeur doit être une des ses réponses de façon aléatoire : 

$questions = ['Essaye plus tard', 'Essaye encore', 'Pas d’avis', 'C’est ton destin', 'Le sort en est jeté', 'Une chance sur deux', 'Repose ta question',
'D’après moi oui', 'C’est certain', 'Oui absolument', 'Tu peux compter dessus', 'Sans aucun doute', 'Très probable', 'Oui', 'C’est bien parti', 'C’est non', 
'Peu probable', 'Faut pas rêver', 'N’y compte pas', 'Impossible'];

echo'<br>';
echo'<hr>';


function magic8Ball(array $questions) {
    $length = count($questions);
    $randomNum = rand(0, $length);
    return $questions[$randomNum];
}

$result = magic8Ball($questions);
echo $result;
 
    

