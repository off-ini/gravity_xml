<?php
session_start();

include("./utils/const.php");
include("./src/io/csv_to_xml.php");

$target_dir = "data/";
$target_file = $target_dir . basename($_FILES["csvUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
 unlink($target_file);
}

// Check file size
if ($_FILES["csvUpload"]["size"] > 50000000) {
    $_SESSION["msg"] = "Désolé, votre fichier est trop volumineux.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "csv") {
    $_SESSION["msg"] = "Désolé, seuls les fichiers CSV sont autorisés.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $_SESSION["error"] = true;
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["csvUpload"]["tmp_name"], $CSV_FILE)) {
    csv_to_xml($CSV_FILE, $XML_FILE);
    $_SESSION["error"] = false;
    $_SESSION["msg"] =  "Le fichier ". htmlspecialchars( basename( $_FILES["csvUpload"]["name"])). " a été upload.";
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
  } else {
    $_SESSION["error"] = true;
    $_SESSION["msg"] = "Désolé, une erreur s'est produite lors du upload de votre fichier.";
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
  }
}
?>