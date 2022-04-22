<?php

// 1. Dans une page « index.php », créer un formulaire contenant un champ de type « file ».
// 2. Vérifier qu’il s’agit bien d’une image (GIF, JPG, JPEG et PNG) et qu’elle ne dépasse pas les 1Mo
// en poids et qu’elle ne soit pas déjà existante dans le dossier d’upload.
// 3. Uploader l’image.
// 4. Afficher l’image dans une page. 

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
    <form action="image2.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile2">
        <button>send</button>
    </form>
</body>

</html>