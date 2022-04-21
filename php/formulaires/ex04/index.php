<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form GET</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-form">
        <form action="ex04.php" method="get">
            <label for="nom">nom</label>
            <input type="text" name="nom">

            <label for="prenom">prenom</label>
            <input type="text" name="prenom">

            <label for="ville">ville</label>
            <input type="text" name="ville">

            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>