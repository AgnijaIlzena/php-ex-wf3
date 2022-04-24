<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php

            // Nettoyage des chaines
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            
            $email = strip_tags($email);
            $password = strip_tags($password);

            if(
                isset($email, $password)
                && !empty($email)
                && !empty($password)
            ) {

                // Vérifie que l'adresse e-mail soit correcte
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                    // Vérifie que le mot de passe contient 6 caractères minimum
                    if (iconv_strlen($password) >= 6) {
                        echo "Bienvenue $email !";
                    }
                    else {
                        echo 'Le mot de passe doit contenir au minimum 6 caractères';
                    }
 
                }   
                else {
                    echo 'Adresse e-mail incorrecte';
                }

            }
            else {
                echo 'Veuillez remplir tous les champs';
            }

        ?>
    </body>
</html>