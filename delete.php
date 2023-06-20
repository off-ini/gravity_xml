<?php
session_start();

include("utils/const.php");
include("src/crud/crud.php");

$gravity = null;
$gravity_id = isset($_GET['gravity_id']) ? $_GET['gravity_id'] : null;

if($gravity_id != null){
    $gravity = delete_el($XML_FILE, $gravity_id);
    if(!$gravity){
        $_SESSION["error"] = true;
        $_SESSION["msg"] = "Erreur lors de la suppression de gravity";

    }else{
        $_SESSION["error"] = false;
        $_SESSION["msg"] = "Gravity supprimer avec succès";
    }
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
}