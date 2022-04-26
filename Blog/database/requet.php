<?php

require_once 'connexion.php';
require_once 'vendor/autoload.php';

$query = $db->query('SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, categories.name AS category, users.lastName AS userLName, users.firstName AS userFname, DATE_FORMAT(posts.created_at, "%d %M %Y") AS date_c
FROM posts 
INNER JOIN categories ON categories.id = posts.category_id 
INNER JOIN users ON users.id = posts.user_id
WHERE posts.id = :id
ORDER BY posts.created_at DESC;');
$query->bindValue(':id', $idSearch);
$blogPosts = $query->fetchAll();

dump($blogPosts);





// with user. this works - no data changet
// SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, categories.name AS category, users.lastName AS userLName, users.firstName AS usersFname
// FROM posts 
// INNER JOIN categories ON categories.id = posts.category_id 
// INNER JOIN users ON users.id = posts.user_id
// ORDER BY posts.created_at DESC;

// with user and with data changed
// SELECT posts.id, posts.title, posts.content, posts.cover, posts.created_at, categories.name AS category, users.lastName AS userLName, users.firstName AS usersFname, DATE_FORMAT(posts.created_at, "%d %M %Y") AS date_c
// FROM posts 
// INNER JOIN categories ON categories.id = posts.category_id 
// INNER JOIN users ON users.id = posts.user_id
// ORDER BY posts.created_at DESC;


?>


