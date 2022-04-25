<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="ajouter.php" method="post">
        <label for="nom">Nom</label>   
        <input type="text" name="nom" id="nom">

        <label for="prenom">Prenom</label>   
        <input type="text" name="prenom" id="prenom">

        <label for="sexe">Sexe</label>   
        <select name="sexe" id="sexe">
            <option value="Femme">Femme</option>
            <option value="Homme">Homme</option>
        </select>

        <label for="ville">Ville</label>   
        <input type="text" name="ville" id="ville">

        <label for="age">Age</label>   
        <input type="text" name="age" id="age">

        <button type="submit">Submit</button>

    </form>
</body>
</html>

