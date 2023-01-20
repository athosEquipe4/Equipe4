<?php  

    try{
        $bd = new PDO('mysql:host=localhost;dbname=sae_s3_internkeep;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

   


?>


 

 