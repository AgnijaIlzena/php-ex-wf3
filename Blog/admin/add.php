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


