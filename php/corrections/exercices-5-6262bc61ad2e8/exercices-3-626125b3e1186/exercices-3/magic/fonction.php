<?php

/**
 * Fonction
 */

function magic8Ball(string $question = null): string|bool {
    if ($question) {
        $pointInterro = $question[strlen($question) - 1];

        if ($pointInterro == '?') {
            $reponses = [
                'Essaye plus tard',
                'Essaye encore',
                'Pas d’avis',
                'C’est ton destin',
                'Le sort en est jeté',
                'Une chance sur deux',
                'Repose ta question',
                'D’après moi oui',
                'C’est certain',
                'Oui absolument',
                'Tu peux compter dessus',
                'Sans aucun doute',
                'Très probable',
                'Oui',
                'C’est bien parti',
                'C’est non',
                'Peu probable',
                'Faut pas rêver',
                'N’y compte pas',
                'Impossible'
            ];
    
            shuffle($reponses);
            $index = rand(0, count($reponses) - 1);
            
            return $reponses[$index];
        }
    }

    return false;
} 
