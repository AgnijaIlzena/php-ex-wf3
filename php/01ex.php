<?php

// Ex1 #1 Afficher des entiers de 1 à 10 à l'aide d'une boucle « while »

$a = 1;
while ($a <= 10) {
    echo $a . ' - ';
    $a++;
}

echo '<br>';
echo '<hr>';


//Ex1 #2 . Idem avec une boucle « for ». 

for ($i= 0; $i<= 10; $i++) {
    echo "$i - ";
}

echo '<br>';
echo '<hr>';

// Ex1 #3 Afficher la table de multiplication de 8 dans un tableau HTML en vertical. 
$chiffre = 8;
$table = '<table>';
for ($j = 0; $j <= 10; $j++) {
    $total = $chiffre*$j;
    $table .= "<tr><td>$chiffre x $j= $total </td></tr>";
} 
$table .= '</table>';
echo $table;

echo '<br>';
echo '<hr>';

// Ex2 #1  Afficher tous les nombres pairs qui sont inférieurs à 20 en commençant par 2 à l’aide de la
//boucle « while ». 

$k = 2;

while($k < 20){
   if ($k%2 === 0) {
    echo $k . ' - ';
   }
    $k++;
}

echo '<br>';
echo '<hr>';

// Ex2 #2  Afficher les 10 premiers entiers et leurs carrés dans un tableau HTML à 2 colonnes. 

echo '<table>';

for($n=0; $n<=10; $n++) {
    echo'<tr>';
    echo '<td>' . $n . '</td>';
    echo '<td>= ' . $n * $n . '</td>';
    echo'</tr>';
}
echo '</table>';

echo '<br>';
echo '<hr>';
// ------------------ OR

$table = '<table>';
for($i=1; $i<=10; $i++){
    $total = $i*$i;
    $table .= "<tr><td>$i</td><td>$total</td></tr>";
}
$table.= '</table>';
echo $table;


echo '<br>';
echo '<hr>';

// Ex2 #3 Afficher 5 fois un numéro aléatoire. 

for ($m=1; $m<=5; $m++) {
    $randomNum = random_int(1, 9);
    echo $m . $randomNum . ' - ';
}

echo '<br>';
echo '<hr>';

//-------------------------OR

echo rand(1,100);
echo random_int(1, 100);  // more natural random

// Ex2 #4  Afficher les tables de multiplication de 1 à 10 dans un tableau HTML. Une table par colonne. 

echo '<table>';
for($v=1; $v<=10; $v++) {
    echo '<tr>';
    for($z=1; $z<=10; $z++) {
        echo '<td>';
        echo $v . 'x' . $z . '=' . $v*$z;
        echo '</td>';
    }
    echo '</tr>';
}

echo '</table>';

echo '<br>';
echo '<hr>';

//-------------------------OR


$table3 = '<table border>';

for($i=1; $i<=10; $i++){
    $table3 .= '<tr>';

        for($j=1; $j<=10; $j++) {
            $total = $i * $j;
            $table3 .= "<td> $i x $j = $total </td>";
        }
    $table3 .= '</tr>';
}
$table3 .= '</table>';
echo $table3;


echo '<br>';
echo '<hr>';

// Ex2 #5 Afficher les entiers de 2 à 20 hormis le nombre 13. 

$p = 2;

while($p <= 20){
   if ($p !== 13) {
    echo $p . ' - ';
   }
    $p++;
}

echo '<br>';
echo '<hr>';

//------------------------------------------OR

$d = 2;
while($d <= 20){
   if ($d === 13) {
    $d++;
    continue;
   }
   echo "$d - ";    
  $d++;
}