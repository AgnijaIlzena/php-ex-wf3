<?php

/**
 * Exercice #2
 * Partie 2
 */

$couleurs = [
    'Rouge' => [
        'hexa' => '#FF0000',
        'rgb' => 'rgb(255, 0, 0)'
    ],
    'Orange' => [
		'hexa' => '#FF4500',
		'rgb' => 'rgb(255, 69, 0)'
	],
	'Cyan' => [
		'hexa' => '#00FFFF',
		'rgb' => 'rgb(0, 255, 255)'
	],
	'Rose' => [
		'hexa' => '#FFC0CB',
		'rgb' => 'rgb(255, 192, 203)'
	]
];

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
            <?php foreach($couleurs as $couleur => $code): ?>
                <li><?php echo $couleur; ?> : <?php echo $code['rgb']; ?></li>
            <?php endforeach; ?>
        </ol>


        <ol>
            <?php foreach($couleurs as $couleur => $code): ?>
                <li><?php echo $couleur; ?> : <?php echo $code['hexa']; ?></li>
            <?php endforeach; ?>
        </ol>

    <p>
        La couleur Cyan à pour RGB : <?php echo $couleurs['Cyan']['rgb']; ?>
    </p>

    </body>
</html>