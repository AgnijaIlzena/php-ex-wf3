<?php

/**
 * Exercice #1
 */

// Point 1
// Afficher des entiers de 1 à 10 à l'aide d'une boucle « while »
$i = 0;
while($i <= 10) {
    echo "$i - ";
    $i++;
}

echo '<hr>';

// Point 2
// Idem avec une boucle « for »
for ($i = 0; $i <= 10; $i++) {
    echo "$i - ";
}

echo '<hr>';

// Multiplication par 8
// Afficher la table de multiplication de 8 dans un tableau HTML en vertical
$chiffre = 8;
$table = '<table border>';
$table .= '<thead><tr><th>Multiplication</th></tr></thead>';

for ($i = 0; $i <= 10; $i++) {
    $total = $chiffre*$i;
    $table .= "<tr><td>$chiffre x $i = $total</td></tr>";
}

$table .= '</table>';
echo $table;


// Point 3
// Afficher tous les nombres pairs qui sont inférieurs à 20 en commençant par 2 à l’aide de la boucle « while »
$index = 2;
while($index < 20) {
    echo "$index - ";
    $index += 2;
}


// Point 4
// Afficher les 10 premiers entiers et leurs carrés dans un tableau HTML à 2 colonnes
echo '<hr>';
$table = '<table border>';

for ($i = 1; $i <= 10; $i++) {
    $total = $i*$i;
    $table .= "<tr><td>$i</td><td>$total</td></tr>";
}

$table .= '<table>';
echo $table;

// Point 5
// Afficher 5 fois un numéro aléatoire
// echo rand(1, 100);
// echo random_int(1, 100);

for ($i = 1; $i <= 5; $i++) {
    echo rand(1, 40) .' - ';
}


// Point 6
// Afficher les tables de multiplication de 1 à 10 dans un tableau HTML. Une table par colonne
$table = '<table border>';

for ($i = 1; $i <= 10; $i++) {
    $table .= '<tr>';

        for ($j = 1; $j <= 10; $j++) {
            $total = $i * $j;
            $table .= "<td>$i x $j = $total</td>";
        }

    $table .= '</tr>';
}

$table .= '</table>';
echo $table;


// Point 7
// Afficher les entiers de 2 à 20 hormis le nombre 13
$index = 2;
while($index <= 20) {

    if ($index !== 13) {
        echo "$index - ";
    }

    $index++;
}


$index = 2;
while($index <= 20) {

    if ($index === 13) {
        $index++;
        continue;
    }

    echo "$index - ";

    $index++;
}

$index = 2;
while($index <= 20) {

    if ($index < 13 || $index > 13) {
        echo "$index - ";
    }

    $index++;
}