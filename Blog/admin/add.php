<?php

// create form to be able to add article
// create file add.php which will clean data of form.
// connect with form.php with URL (GET method). Direction from Form
// create query: INSERT INTO DB. Form data treatment. Execute the SQL request.
// redirect to index.php where is list of all articles.

// 
require_once '../vendor/autoload.php';
require_once '../connexion.php';
dump($_POST);
dump($_FILES);

echo $_POST['title'];
echo $_FILES['cover']['name'];
echo $_POST['category'];
echo $_POST['content'];

// TREAT  COVER - IMAGE
$error = null;
$typeExtension = [
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'gif' => 'image/gif',
];
$extension = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));
$poidsMax = 1 * 1048576;

 if (!empty($_FILES['cover']) && $_FILES['cover']['error'] === 0) {
    if (array_key_exists($extension, $typeExtension) && in_array($_FILES['cover']['type'], $typeExtension)) {
        if ($_FILES['cover']['size'] <= $poidsMax){
            //move_uploaded_file($_FILES['cover']['tmp_name'], "uploads/{$_FILES['cover']['name']}"); // original first  upload method version, saves file with original filename.
            
          //  $newFileName = (!empty($_POST['userFileName'])) ? "{$_POST['userFileName']}.$extension" : $_FILES['cover']['name']; // uploads method with providing new file name for uploaded file when added via POST method form


          // create new file name to downloaded file. 
            $fileName = explode('.', $_FILES['cover']['name']);
            $newfilename = round(microtime(true)) . '.' . end($fileName); 
           

           // verifiez if image with the same name already exists
            if (!file_exists("Images/upload/$newFileName")) {
                //save a file in upload folder with the new name.
                move_uploaded_file($_FILES['cover']['tmp_name'], "Images/upload/" . $newfilename);
            }

            // Cretion de la miniature
            require_once 'functions.php';
            $imageSource = "Images/upload/$newFileName";
            $destImagePath ="Images/thumbs/min_$newFileName";  
            createThumb($imageSource, $destImagePath, $width = 150, $height = null);
           
        } else {
            $error = 'Max file size 1Mo exceeded';
        }
    } else {
        $error = 'Wrong file extension!';
    }
} else {
    $error = 'File is required';
}

