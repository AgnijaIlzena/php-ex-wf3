<?php

//CREATE INSERT SQL REQUET - this is seperate

// CATEGORIES requete - this requete need to fill manualy before
$query = $db->prepare('INSERT INTO categories (name) VALUES (:name)');
$query->bindValue(':name', $something);
$query->execute;

//USERS requete
//need to choose only one id which is relevant to Admin


// POSTS requete
//should verify correct user_id of admin in data base
$user_id = 1;
$query = $db->prepare('INSERT INTO posts (title, content, category_id, user_id, cover, created_at) VALUES (:title, :content, :category_id, :user_id, :cover, :created_at)');
$query->bindValue(':title', $title);
$query->bindValue(':content', $content);
// need to search corresponding category ids at first
$query->bindValue(':category_id', $something); 
$query->bindValue(':user_id', $user_id); 
// need to search corresponding image cover name from upload folder with variable. So at first Comes image Upload, so that I have a name.
$query->bindValue(':cover', $something); 
// need to add date stump? as seperate variable above and here rathere precise format.
$query->bindValue(':created_at', $createdAt->format('Y-m-d') ); 
$query->execute();



// TREAT TITLE, CONTENT, CATEGORY


$title = htmlspecialchars($_POST['title']);
$title = strip_tags($title);

$category = htmlspecialchars($_POST['category']);
$category = strip_tags($category);

$content = htmlspecialchars($_POST['content']);
$content = strip_tags($content);


if (isset($title, $category, $content )
&& !empty($title)
&& !empty($category)
&& !empty($content)
) {
    //CREATE INSERT SQL REQUET
} else {
    $error = 'All fields are required!';
}


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



