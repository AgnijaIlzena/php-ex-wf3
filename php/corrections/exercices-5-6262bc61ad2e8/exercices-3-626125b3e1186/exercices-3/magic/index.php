<?php

/**
 * Magic 8 Ball
 */

require_once 'fonction.php';

$reponse = magic8Ball('Internet explorer 6 va-t-il revenir ?');

if ($reponse === false) {
    echo 'Poses une question';
}
else {
    echo $reponse;
}