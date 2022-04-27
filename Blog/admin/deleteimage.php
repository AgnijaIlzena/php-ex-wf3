<?php

require_once '../vendor/autoload.php';
require_once '../database/requet.php';
require_once '../connexion.php';

$idpost = htmlspecialchars(strip_tags($_GET['idpost']));
dump($idpost);
$query = $db->prepare('DELETE FROM posts WHERE posts.id = :idpost');

$query->bindValue(':idpost', $idpost, PDO::PARAM_INT);
$query->execute();
$deletePost = $query->fetch;


dump($_GET['idpost']);

    if (!unlink($idpost)) {
         echo 'an error accured deleting the file';         
    } else {
        //echo 'The file was deleted succesfully';
        unlink($idpost); 
        header("Location: /admin/index.php?deletesuccess");
    }


