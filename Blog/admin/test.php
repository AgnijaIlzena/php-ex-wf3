<?php
// TREATCOVER - IMAGE

$error = null;
$typeExtension = [
    'png' => 'image/png',
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'gif' => 'image/gif',
];
$poidsMax = 1 * 1048576;
$extension = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));

 if (!empty($_FILES['cover']) && $_FILES['cover']['error'] === 0) {
    if (array_key_exists($extension, $typeExtension) && in_array($_FILES['cover']['type'], $typeExtension)) {
        if ($_FILES['cover']['size'] <= $poidsMax){
            //move_uploaded_file($_FILES['myfile']['tmp_name'], "uploads/{$_FILES['myfile']['name']}"); // old upload version
            
          //  $newFileName = (!empty($_POST['userFileName'])) ? "{$_POST['userFileName']}.$extension" : $_FILES['myfile']['name'];

          $fileName = explode('.', $_FILES['cover']['name']);
          $newfilename = round(microtime(true)) . '.' . end($fileName); 
          move_uploaded_file($_FILES["cover"]["tmp_name"], "Images/upload/" . $newfilename);


           // verifiez si image exist deja
            if (!file_exists("uploads/$newFileName")) {
                move_uploaded_file($_FILES['myfile']['tmp_name'], "uploads/$newFileName");
            }

            // Cretion de la miniature
            require_once 'functions.php';

            $imageSource = "uploads/$newFileName";
            $destImagePath ="thumbs/$newFileName";  // OU "thumbs/min_$newFileName";
            createThumb($imageSource, $destImagePath, $width = 150, $height = null);
           
        } else {
            $error = 'Max file size 1Mo exceeded';
        }
    } else {
        $error = 'Wrong file extension!';
    }
} 


if (!empty($_FILES['myfile3']) && $_FILES['myfile3']['error'] === 0) {
   
    $incomingFileName = explode(".", $_FILES["myfile3"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($incomingFileName);
    move_uploaded_file($_FILES["myfile3"]["tmp_name"], "uploads/" . $newfilename);
};
// $email = htmlspecialchars($_POST['email']);
print_r($_POST['userFileName']);