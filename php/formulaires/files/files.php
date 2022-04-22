<?php

/**
 * Upload of file
 */

 echo '<pre>';
print_r($_FILES);
 echo '</pre>';

 move_uploaded_file($_FILES['fichier']['tmp_name'], "fichiers/{$_FILES['fichier']['name']}");