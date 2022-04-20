<?php


$prenom = "Ella";
$client = [
    'prenom' => $prenom,
    'nom' => 'West',
    'age' => 40 
];

$clients = [
    ['id' => 1, 'nom' => 'Bella', 'prenom' => 'Karla'],
    ['id' => 2, 'nom' => 'Doe', 'prenom' => 'John']
];

// while...

$i = 0;
echo '<ul>';
while($i <= 10){
    echo "<li>$i</li>";
    $i++;
}
echo '</ul>';

// do .... while
$j = 0;
do {
 echo "<p>$j</p>";
 $j++;
} while($j <= 10);

// for

$phrase = null;
for($index = 0; $index<= 5; $index++){
    // concatene l'index à la variable $phrase
     $phrase .= $index;

     // si l'index est inferieur à 5...
    if($index < 5) {
        //on concatene une virgule
        $phrase .= ', ';
    }
}
echo $phrase;
echo '<hr>';

// tableau indexé

$numeros = [12, 5, 67, 43, 6, 3, 5, 8];

for ($k = 0; $k < count($numeros); $k++) {
    echo $numeros[$k] . ', ';
}
echo '<hr>';

// foreach

foreach($numeros as $item) {
    echo "$item; ";
}
echo '<hr>';

// foreach

foreach($numeros as $index => $value) {
    echo "$index => $value; ";
}
echo '<hr>';
// foreach with associative array

foreach ($clients as $client) {
    echo "{$client['nom']}, {$client['prenom']}";
}