<?php

$capitals = [
    'Italie'=> 'Rome',
    'Luxembourg' => 'Luxembourg',
    'Danemark'=> 'Copenhague',
    'Irlande'=> 'Dublin',
    'Hongrie'=> 'Budapest',
];

// Ex1#2  Trier les valeurs du tableau par ordre alphabétique (mieux asort())
ksort($capitals);
foreach ($capitals as $country => $capital) {
         echo "$country: $capital , ";
}

echo '<hr>';
echo '<br>';

// Ex1#3  Afficher ce tableau associatif dans un tableau HTML (normalement, tous les résultats doivent
ksort($capitals);
echo '<table>';
echo '<tbody>';
foreach ($capitals as $country => $capital) {
    echo '<tr>';
    echo "<td> $country: </td>" ;
    echo "<td> $capital </td>";
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

echo '<hr>';
echo '<br>';

?>
<!-- ------------------------------------OR -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><Table></Table></title>
</head>
<body>
    <h1>Pays</h1>
    <table>
        <thead>
            <tr>
                <th>Pays</th>
                <th>Capitale</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($capitals as $country => $capital):
            ?>
            <tr>
                <td><?php echo $country;?></td>
                <td><?php echo $capital;?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
echo '<hr>';
echo '<br>';
// Ex1#4  De nouvelles données viennent d’arriver et Martine en est à son troisième Xanax, il faut l’aider !
// Insérer les nouvelles données reçues dans votre tableau actuel : 

$array2 = [
    'Angleterre' => 'Londres',
    'Allemagne' => 'Berlin'
];

//$result = array_merge( $capitals, $array2 ); // nav jaataisa jauns variable lai salaadeetu dazhaadu array datus, var mergot virsuu ieprieksheejam.
$capitals = array_merge($capitals, $array2);

// -----------------------------OR v2

$capitals['Angleterre'] = 'Londres';
$capitals['Allemagne'] = 'Berlin';

// -----------------------------OR v3

$capitals += $array2;

// -----------------------------OR v4

//spread operator
$capitals = [...$capitals, ...$array2];

// -----------------------------OR v5

$array2 = [
    ...$capitals,
    'Angleterre' => 'Londres',
    'Allemagne' => 'Berlin'
];

// Ex1#5 Afficher le tableau grâce à une fonction réservé au débogage. 

echo '<pre>';
var_dump($capitals);  // or print_r();
echo '</pre>';

echo '<hr>';
echo '<br>';
// Ex2#1

$colors = [
    ['cName' => 'Rouge', 'hex' => '#FF0000', 'rgb' => 'rgb(255, 0, 0)' ],
    ['cName' => 'Orange', 'hex' => '#FF4500', 'rgb' => 'rgb(255, 69, 0)' ],
    ['cName' => 'Cyan', 'hex' => '#00FFFF', 'rgb' => 'rgb(0, 255, 255)' ],
    ['cName' => 'Rose', 'hex' => '#FFC0CB', 'rgb' => 'rgb(255, 192, 203)' ]
];

//-------------------OR

$couleurs = [
    'Rouge' => [
        'hex' => '#FF0000',
        'rgb' => 'rgb(255, 0, 0)'
    ],
    'Orange' => [
        'hex' => '#FF4500',
        'rgb' => 'rgb(255, 69, 0)'
    ],
    'Cyan' => [
        'hex' => '#00FFFF',
        'rgb' => 'rgb(0, 255, 255)'
    ],
    'Rose' => [
        'hex' => '#FFC0CB',
        'rgb' => 'rgb(255, 192, 203)'
    ]
    ];

// Ex2#2   Dans une liste, vous devez afficher le nom de la couleur et son code RGB à côté. 

echo '<ul>';
foreach($colors as $value) {
    echo '<li>';
    echo "{$value['cName']}:  {$value['rgb']}";
    echo '</li>';
}
echo '</ul>';

echo '<hr>';
echo '<br>';

//-----------------------------------OR

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<ol>
    <?php
    foreach($couleurs as $couleur => $code):
    ?>

    <li><?php echo $couleur; ?> : <?php echo $code['rgb']?></li>

    <?php 
    endforeach;
    ?>
</ol>
<ol>
    <?php
    foreach($couleurs as $couleur => $code):
    ?>

    <li><?php echo $couleur; ?> : <?php echo $code['hex']?></li>

    <?php 
    endforeach;
    ?>
</ol>

<p>
La couleur Cyan à pour RGB: <?php echo $couleurs['Cyan']['rgb']; ?>
</p>
    
</body>
</html>

<?php
echo '<hr>';
echo '<br>';

// Ex2#3  Dans une seconde liste, vous devez afficher le nom de la couleur et son code hexadécimal à côté

echo '<ul>';
foreach($colors as $value) {
    echo '<li>';
    echo "{$value['cName']}:  {$value['hex']}";
    echo '</li>';
}
echo '</ul>';

echo '<hr>';
echo '<br>';

// Ex2#4 Afficher le code RGB de la couleur Cyan dans une phrase sans utiliser de boucle.

echo " Cayane RGB code is {$colors[2] ['rgb']} .";