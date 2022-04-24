<?php

/**
 * Upload une image
 */

 // Initialise la variables des erreurs à NULL
$error = null;

// Vérifie si un fichier est bien envoyé
if (!empty($_FILES['image'])  && $_FILES['image']['error'] == 0) {

    // Tableau de vérification des extension et types MIME
    $typeExt = [
        'png' => 'image/png',
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif'
    ];

    // Poids max. du fichier
    // 1Mo = 1048576 octets
    $poidsMax = 1 * 1048576;

    // Récupération de l'extension
    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    // Vérifie que le fichier possède la bonne extension et le bon type MIME
    if (
        array_key_exists($extension, $typeExt) 
        && in_array($_FILES['image']['type'], $typeExt)
    ) {

        // Vérifie si l'image ne dépasse pas les 1Mo
        if ($_FILES['image']['size'] <= $poidsMax) {

            $newName = (!empty($_POST['new_name'])) 
                ? "{$_POST['new_name']}.$extension"
                : $_FILES['image']['name'];

            // Vérifie que l'image n'existe pas déjà
            if (!file_exists("pictures/$newName")) {
                
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    "pictures/$newName"
                );
            }
            else {
                $error = 'Veuillez modifier le nom du fichier';
            }
        }
        else {
            $error = 'Le poids de l\'image dépasse les 1Mo';
        }
    }
    else {
        $error = 'Le fichier n\'est pas une image';
    }
}

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
        
        <?php if($error !== null): ?>
            <p style="color: red">
                <?php echo $error; ?>
            </p>
        <?php else: ?>
            <img src="pictures/<?php echo $_FILES['image']['name']; ?>" alt="CCC">
        <?php endif; ?>

    </body>
</html>