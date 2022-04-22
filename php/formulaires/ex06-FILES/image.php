<?php

echo '<pre>';
print_r($_FILES);
echo '</pre>';

if (!empty($_FILES['myfile']) && $_FILES['myfile']['error']===0) {
    move_uploaded_file($_FILES['myfile']['tmp_name'], "uploads/{$_FILES['myfile']['name']}");
};

$newImage = "uploads/{$_FILES['myfile']['name']}";  // DO NOT FORGET ECO!!!

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
    <div class="img-container">
        <img src="uploads/image1.jpg" alt="random image">
        <img src=<?php echo $newImage ?> alt="random image">
    </div>
</body>
</html>