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
$extension = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
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
            if (!file_exists("Images/upload/$newfilename")) {
                //save a file in upload folder with the new name.
                move_uploaded_file($_FILES['cover']['tmp_name'], "../Images/upload/" . $newfilename);
            }

            $imagePath = "../Images/upload/" . $newfilename;

            // Cretion de la miniature
            require_once 'functions.php';
            $imageSource = "../Images/upload/$newfilename";
            $destImagePath ="../Images/thumbs/min_$newfilename";  
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

// USERS ROLE QUERY
$roleAdmin = 'ROLE_ADMIN';
$query = $db->prepare('SELECT users.id FROM `users` WHERE users.role = :role_admin');
$query->bindValue(':role_admin', $roleAdmin);
$query->execute();
$role = $query->fetch();

// CATEGORY DATA are provided in FORM
$categoryId = $_POST['category'];

// POSTS requete
//should verify correct user_id of admin in data base

$date = date("jS F, Y", strtotime("now")); 

$query = $db->prepare('INSERT INTO posts (title, content, category_id, user_id, cover, created_at) VALUES (:title, :content, :category_id, :user_id, :cover, :created_at)');
$query->bindValue(':title', $title);
$query->bindValue(':content', $content);
$query->bindValue(':category_id', $categoryId); 
$query->bindValue(':user_id', $role); 
$query->bindValue(':cover', $imagePath); 
$query->bindValue(':created_at', $date); 
$query->execute();








