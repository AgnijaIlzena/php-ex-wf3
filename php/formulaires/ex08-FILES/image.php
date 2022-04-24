<?php

require_once 'functions.php';
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

//  

$error = null;

$typeExtension = [
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'gif' => 'image/gif',
];

 // 1Mo = 1048576 octets
 $poidsMax = 5 * 1048576;

 $extension = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));

 if (!empty($_FILES['myfile']) && $_FILES['myfile']['error'] === 0) {
    if (array_key_exists($extension, $typeExtension) && in_array($_FILES['myfile']['type'], $typeExtension)) {
        if ($_FILES['myfile']['size'] <= $poidsMax){
            //move_uploaded_file($_FILES['myfile']['tmp_name'], "uploads/{$_FILES['myfile']['name']}"); // old upload version
            
            $newFileName = (!empty($_POST['userFileName'])) ? "{$_POST['userFileName']}.$extension" : $_FILES['myfile']['name'];
            if (!file_exists("uploads/$newFileName")) {
                move_uploaded_file($_FILES['myfile']['tmp_name'], "uploads/$newFileName");
            }

            $imageSource = "uploads/$newFileName";
            $destImagePath ="thumbs/$newFileName";
            createThumb($imageSource, $destImagePath, $width = 150, $height = null);
           
        } else {
            $error = 'Max file size 1Mo exceeded';
        }
    } else {
        $error = 'Wrong file extension!';
    }
} 






// ------------------------------

// if (!empty($_FILES['myfile3']) && $_FILES['myfile3']['error'] === 0) {
//     // Uploader l’image et renommer-la avec le nom choisit par l’utilisateur
//     $incomingFileName = explode(".", $_FILES["myfile3"]["name"]);
//     $newfilename = round(microtime(true)) . '.' . end($incomingFileName);
//     move_uploaded_file($_FILES["myfile3"]["tmp_name"], "uploads/" . $newfilename);
// };
// // $email = htmlspecialchars($_POST['email']);
// print_r($_POST['userFileName']);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
    
    <?php if ($error !==null): ?>
        <p class="error">
        <?php 
          echo $error; 
        ?> 
        </p>
        <?php else: ?>

            <img src="thumbs/<?php echo $newFileName ?>" alt="random picture"> 
                       
            <form action="delete.php" method="post">
                <input type="hidden" name = "thisimagename" value = "<?php echo $newFileName ?>">
                <button type="submit">delete</button>
            </form>        
            
        <?php endif; ?> 
    
    </div>
</body>

</html>