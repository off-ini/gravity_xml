<?php

$DBNAME = 'GRAVITY';
$USER = 'root';
$PASS = '';
$DSN = 'mysql:host=localhost;dbname='.$DBNAME;

try{
    $CON = new PDO($DSN, $USER, $PASS);
    //echo 'Connexion reussie';
}catch(PDOException $e){
    echo 'CONNEXION ERROR : '. $e->getMessage();
    die();
}

?>