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
    <form action="image3.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile3">
        <input type="text" name="userFileName">
        <button>send</button>
    </form>
</body>

</html>