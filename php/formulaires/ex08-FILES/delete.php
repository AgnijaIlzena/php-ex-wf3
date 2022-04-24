<?php 

$path = 'thumbs/'.$_POST['thisimagename'];
$bigimgPath = 'uploads/'.$_POST['thisimagename'];

    if (!unlink($path)) {
        echo 'an error accured deleting the file'; 
        
    } else {
        //echo 'The file was deleted succesfully';
        unlink($bigimgPath); 
        header("Location: index.php?deletesuccess");
    }

  
