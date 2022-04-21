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

        //security 1
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);

        //security 2
        $email = strip_tags($email);
        $pass = strip_tags($pass);

        // function to validate email 
        function isValidEmail($email)
        {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                return false;
            }
        }

        //validate email and password
        if (isset($email, $pass))  {

            if (empty($email)) {
                $errors[] = 'La champe \'email\' doit etre rempli';
            }
            if (isValidEmail($email) === false) {
                $errors[] = 'La champe \'email\' doit etre rempli correctement';
            } 
            if (empty($pass)) {
                $errors[] = 'La champe \'pass\' doit etre rempli';
            }
            if (mb_strlen($pass) < 6) {
                $errors[] = 'La champe \'pass\' doit contenir minimum 6 symbols';
            }                    
            else {
                echo '<p> BIENVENU !   Votre email <span style="color:green;">' . $email . '</span> est enregistré! </p>';
            }
        }

        ?>     
    </div>

    <div class="output-container">
        <p class="error">
            <?php
            foreach ($errors as $error => $value) {
                echo  $value . '<br>';
            }
            ?>
        </p>
        <a href="index.php" title="return to form">return to form</a>
    </div>

</body>

</html>