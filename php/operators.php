<?php
/**
 * Les OPERATORS
 */

 $one = 10;
 $two = 20;

 var_dump($one + $two);
 var_dump($one - $two);
 var_dump($one * $two);
 var_dump($one / $two);
 var_dump($one % $two);
 var_dump($one ** $two); // puissance

 /**
  * INCREMENTATION & DECREMENTATION
  */

  // Post incrementattion
  var_dump($one++, $one);   // one + 1  . Post incrementation

  // Post decrementattion
  var_dump($one--, $one); 

  // pre-incrementation
  var_dump(++$one);

   // pre-decrementation
   var_dump(--$one);

   /**
    * Comparaison
    */

    // Egal à ...
    var_dump($one == $two);

    // Strictement égal à..
    var_dump($one === $two);

    // Different de...
    var_dump($one != $two);

    // Strictement different de ..
    var_dump($one !== $two);

    // Superieur à..
    var_dump($one > $two);

    // Superieur ou egale à..
    var_dump($one >= $two);

          // Inferieur à..
    var_dump($one < $two);

    // Inferieur ou egale à..
    var_dump($one <= $two);


/**
 * OPERATORS LOGICS
 */

    //  condition OR condition
    var_dump($one === $two || $one < $two);

    //  condition AND condition
    var_dump($one === $two && $one < $two);

//  operator non logique
var_dump(!false);
var_dump(!$one === $two);

/**
 * Coalescence nulle
 */

 $var = null;
 $autreVariable = 12;

 $resultat = $var ?? 'Je suise récupéré';  //(if var = resultat tu le recuper, si non recuper  '' jeb valeur par default)
var_dump($resultat);

$resultat = $autreVariable ?? 56;
var_dump($resultat);

$var = null;
$re = 2;
$re = $var ?? 5;
var_dump($re);


