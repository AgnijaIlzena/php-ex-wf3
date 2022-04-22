<?php

/**
 * 1. Dans une page « index.php », créer un formulaire contenant un champ de type « file ».
 * 2. Uploader l’image choisit par l’utilisateur et l’afficher dans une seconde page « image.php »
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
    <form action="image.php" method="post" enctype="multipart/form-data">
        <input type="file" name="myfile">
        <button>send</button>
    </form>
</body>

</html>