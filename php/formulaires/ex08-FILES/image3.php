<?php

/**
 * Dans une page « index.php », créer un formulaire contenant un champ de type « file » et un
 * champs de type texte.
 * 2. Vérifier qu’il s’agit bien d’une image (GIF, JPG, JPEG et PNG) et qu’elle ne dépasse pas les 1Mo
 * en poids.
 * 3. Uploader l’image et renommer-la avec le nom choisit par l’utilisateur. Vérifier que le l’image
 * n’est pas déjà existante dans le dossier d’upload.
 * 4. Générer une miniature de 150x150pixel.
 * 5. Afficher la miniature de l’image dans une page avec un lien sous celle-ci afin de pouvoir la
 *  supprimer si besoin.
 */

$typeExt = [
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
];

$extension = null;


echo '<pre>';
print_r($_FILES);
echo '</pre>';

$newName = (!empty($_POST['userFileName'])) ? "{$_POST['userFileName']} . $extension" : $_FILES['image']['name'];
if (!empty($_FILES['myfile3']) && $_FILES['myfile3']['error'] === 0) {
    move_uploaded_file($_FILES["myfile3"]["tmp_name"], "uploads/" . $newName);
}



// ------------------------------

if (!empty($_FILES['myfile3']) && $_FILES['myfile3']['error'] === 0) {
    // Uploader l’image et renommer-la avec le nom choisit par l’utilisateur
    $incomingFileName = explode(".", $_FILES["myfile3"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($incomingFileName);
    move_uploaded_file($_FILES["myfile3"]["tmp_name"], "uploads/" . $newfilename);
};
// $email = htmlspecialchars($_POST['email']);
print_r($_POST['userFileName']);


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
    <div>
        <img src=<?php echo 'uploads/' . $newfilename ?> alt="image" width="150" height="150">
        <a href="blank.php?file=deleted">delete</a>
        <?php


        ?>
    </div>
</body>

</html>