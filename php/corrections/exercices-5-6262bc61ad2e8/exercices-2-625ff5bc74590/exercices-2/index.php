<?php

/**
 * Exercice #2
 */

#1
$pays = [
	'Italie' => 'Rome',
	'Luxembourg' => 'Luxembourg',
	'Danemark' => 'Copenhague',
	'Irlande' => 'Dublin',
	'Hongrie' => 'Budapest'
];

#2
asort($pays);

/* echo '<pre>';
print_r($pays);
echo '</pre>'; */

#4
// $pays['Angleterre'] = 'Londres';
// $pays['Allemagne'] = 'Berlin'; 

$pays_supp = [
    'Allemagne' => 'Berlin',
    'Angleterre' => 'Londres'
];

// $pays = array_merge($pays, $pays_supp);
// $pays += $pays_supp;

// Spread operator
$pays = [...$pays, ...$pays_supp];

#5
echo '<pre>';
print_r($pays);
echo '</pre>';

asort($pays);

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
                    foreach($pays as $key => $value):
                ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
    </body>
</html>