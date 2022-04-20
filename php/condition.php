<?php

/**
 * CONDITIONS
 

 * if (condition) {...};
 *  if (condition) {...} else  ... {...};
 * if (condition) {...} elseif (condition) {...} else {...};   // order is very important. Need to
 *  place most important as the first otherwise it will never come to second if.

 */


 /**
  * SWITCH verifie seulement l'egalité à une valeu
  * iekavaas liek variable , ko chekos
  */

  $prenom = 'Rita';
  
  switch($prenom) {
    case 'Juiliette' :
        echo "Hello $prenom !";
        break;
    case 'Jean':
        echo "Bonjour $prenom !";
        break;
    case 'Anna':
        echo "Hello $prenom !";
        break;

    default:
    echo 'Tu es qui?';
  }