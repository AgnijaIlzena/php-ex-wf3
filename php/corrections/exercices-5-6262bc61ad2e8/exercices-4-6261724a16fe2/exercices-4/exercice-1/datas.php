<?php

/**
 * Réception et traitement des données
 */

// "htmlspecialchars" convertit les caractères spéciaux en entités HTML
$prenom = htmlspecialchars($_POST['prenom']);
$nom = htmlspecialchars($_POST['nom']);
$ville = htmlspecialchars($_POST['ville']);

// "strip_tags" supprime les balises HTML et PHP d'une chaîne
$prenom = strip_tags($prenom);
$nom = strip_tags($nom);
$ville = strip_tags($ville);

if (
    isset($prenom, $nom, $ville) 
    && !empty($prenom) 
    && !empty($nom)
    && !empty($ville)
) {
    echo "Tu es $prenom $nom et tu habites à $ville.";
}
else {
    echo 'Veuillez remplir tous les champs';
}
