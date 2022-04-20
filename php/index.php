<?php

include 'calcul.php';
$air = calculAire(5, 8);
echo $air;

// Include    => if make error frapp, will show warning but will continue execute the rest of code.
// Require     => will give fatal error. And it stops the program.   So the difference is in terms of error
// Include_once
// Require_once  => will give only once the function, even if it is asked many times.