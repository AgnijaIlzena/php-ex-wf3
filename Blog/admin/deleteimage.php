<?php

require_once '../connexion.php';
require_once '../vendor/autoload.php';

if (!empty($_GET)) {
    $idpost = htmlspecialchars(strip_tags($_GET['idpost']));

    if (
        !empty($idpost)
    ) {
        $query = $db->prepare('DELETE FROM posts WHERE posts.id = :idpost');
        $query->bindValue(':idpost', $idpost, PDO::PARAM_INT);
        $query->execute();

        header('Location: index.php?successDeleted=1');        
    }
}


// if (!unlink($idpost)) {
//     echo 'an error accured deleting the file';
// } else {
//     unlink($idpost);
//     header('Location: index.php?successDeleted=1');
// }