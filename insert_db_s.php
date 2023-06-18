<?php
include("./utils/const.php");
include("./src/io/db.php");
include("./src/io/db_manager.php");


if(xml_to_db($CON, $XML_FILE)){

    $_SESSION["error"] = false;
    $_SESSION["msg"] =  "Le fichier a été ajouter dans la base MySQL.";
    $url = "csv.php";
    //echo "Le fichier a été ajouter dans la base MySQL.";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
}else{
    $_SESSION["error"] = true;
    $_SESSION["msg"] = "Erreur lors de l'insertion dans la bse MySQL.";
    $url = "csv.php";
    //echo "Erreur lors de l'insertion dans la bse MySQL.";
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $url");
}