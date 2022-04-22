<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Single File -->
<form action="files.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fichier">
    <button>Envoyer</button>

</form>    

<!-- Multiple Files -->

<form action="files.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fichier[]" multiple>
    <button>Envoyer</button>
</form>  

</body>
</html>