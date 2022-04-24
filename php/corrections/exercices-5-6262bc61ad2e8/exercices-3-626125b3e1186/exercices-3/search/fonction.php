<?php

/**
 * Fonction
 */

function inArray(array $array, string|int $search): bool {
    foreach($array as $item) {
        // "strtolower" passe une chaine de caractère en
        // minuscule
        if (strtolower($item) === strtolower($search)) {
            return true;
        }
    }

    return false;
}
