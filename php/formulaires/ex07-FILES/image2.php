<?php

// 1. Dans une page « index.php », créer un formulaire contenant un champ de type « file ».
// 2. Vérifier qu’il s’agit bien d’une image (GIF, JPG, JPEG et PNG) et qu’elle ne dépasse pas les 1Mo
// en poids et qu’elle ne soit pas déjà existante dans le dossier d’upload.
// 3. Uploader l’image.
// 4. Afficher l’image dans une page. 

// echo '<pre>';
// print_r($_FILES);
// echo '<pre>';


$allowed = array('gif', 'jpg', 'jpeg', 'png');
$filename = $_FILES['myfile2']['name'];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$uploadedFileName = "uploads/{$_FILES['myfile2']['name']}";
$poidsmax = 1 * 1048576; // 1MO = 1 048 576 octes 

if (in_array($ext, $allowed)) {
    if ($_FILES['myfile2']['size'] <= $poidsmax) {
        if (file_exists($uploadedFileName) === false) {
            move_uploaded_file($_FILES['myfile2']['tmp_name'], $uploadedFileName);
        } else {
            echo "the file exists already";
        }
    } else {
        echo "file size extends 1Mo";
    }
} else {
    echo "file name is wrong";
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
    <div>
        <img src=<?php echo $uploadedFileName ?> alt=<?php echo $filename ?>>
    </div>
</body>

</html>