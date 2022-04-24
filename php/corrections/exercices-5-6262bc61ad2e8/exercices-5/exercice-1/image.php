<?php


if (!empty($_FILES['image']) && $_FILES['image']['error'] === 0) {
   move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "imgs/{$_FILES['image']['name']}"
    ); 
}

// echo "imgs/{$_FILES['image']['name']}";

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
        <img src="<?php echo "imgs/{$_FILES['image']['name']}"; ?>" alt="Image">
    </body>
</html>