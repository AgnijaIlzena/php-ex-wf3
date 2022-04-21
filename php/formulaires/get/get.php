<?php 

// Receptionner les données en GET



// comment recepcioner l information
echo '<pre>';
print_r($_GET);
echo '</pre>';

if (isset($_GET['prenom'])){
echo $_GET['prenom'];
}