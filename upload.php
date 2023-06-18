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
if ($_FILES["csvUpload"]["size"] > 5000000) {
    $_SESSION["msg"] = "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "csv") {
    $_SESSION["msg"] = "Sorry, only CSV files are allowed.";
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
    $_SESSION["msg"] =  "The file ". htmlspecialchars( basename( $_FILES["csvUpload"]["name"])). " has been uploaded.";
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
  } else {
    $_SESSION["error"] = true;
    $_SESSION["msg"] = "\nSorry, there was an error uploading your file.";
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    //header("Location: $url");
  }
}
?>