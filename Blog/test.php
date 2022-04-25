<?php

/**
 * Test de var_dumper()
 */

 // Chargement de l'autoloder de Composer
 require_once 'vendor/autoload.php';

 $array = [
    'id'=> 1,
    'prenom' => 'Anna',
 ];

 var_dump($array);
 dump($array);