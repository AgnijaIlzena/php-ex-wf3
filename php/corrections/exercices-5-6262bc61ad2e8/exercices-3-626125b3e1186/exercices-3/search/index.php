<?php

/**
 * Recherche un élément dans un tableau
 */

require_once 'fonction.php';

// Mon tableau
$elements = ['test', 34, 'Bonjour', 'Martine', 'Brouette'];

$response = inArray($elements, 34);
var_dump($response);