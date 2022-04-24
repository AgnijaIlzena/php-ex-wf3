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
    <div class="output-container">
        <?php

        $errors[] = null;


        // In class:
  /*      
        //security 1
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $ville = htmlspecialchars($_POST['ville']);

         //security 2
         $prenom = strip_tags($prenom);
         $nom = strip_tags($nom);
         $ville = strip_tags($ville);


        if (isset($prenom, $nom, $ville) && !empty($prenom) && !empty($nom) && !empty($ville)) {
            echo "Tu es $prenom et tu habites $ville";
        } else {
        echo  'Veuillez remplir tous les champs!';
        }

*/


        if (isset($_GET['nom'])) {
            echo '<p>' . $_GET['nom'] . '</p>';
        }
        
        if (empty($_GET['nom'])) {
            $errors[] = 'La champe \'nom\' doit etre rempli';
        }

        if (isset($_GET['prenom'])) {
            echo '<p>' . $_GET['prenom'] . '</p>';
        }
        if (empty($_GET['prenom'])) {
            $errors[] = 'La champe \'prenom\' doit etre rempli';
        }


        if (isset($_GET['ville'])) {
            echo '<p>' . $_GET['ville'] . '</p>';
        }
        if (empty($_GET['ville'])) {
            $errors[] = 'La champe \'ville\' doit etre rempli';
        }

        ?>
    </div>

    <div class="output-container">
        <p class="error">
            <?php
            foreach ($errors as $error => $value) {
                echo  $value;
            }
            ?>
        </p>
        <a href="index.php" title="return to form">return to form</a>
    </div>

</body>

</html>