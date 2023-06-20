<?php
session_start();

include("./src/io/db.php");


$SQL_CREATE = "CREATE TABLE IF NOT EXISTS gravity(
    gravity_id varchar(32) PRIMARY KEY NOT NULL,
    year varchar(8) null,
    country_id_o varchar(8) null,
    country_id_d varchar(8) null,
    distw_harmonic integer null,
    distw_arithmetic integer null,
    dist integer null,
    distcap integer null,
    contig integer null DEFAULT 0,
    comlang_off integer null DEFAULT 0,
    comcol integer null DEFAULT 0,
    comrelig float null,
    pop_o float null,
    pop_d float null,
    gdp_o float null,
    gdp_d float null,
    pop_pwt_o float null
);

TRUNCATE TABLE gravity;";

try{
    $CON->exec($SQL_CREATE);
    //echo "Table Gravity created...<br />";
    $_SESSION["error"] = false;
    $_SESSION["msg"] =  "La table Gravity a été créé!";
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
}catch(PDOException $e){
    //echo 'CREATE ERROR : '. $e->getMessage();
    $_SESSION["error"] = true;
    $_SESSION["msg"] =  "Erreur lors de la création de la table => ".$e->getMessage();
    $url = "csv.php";
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: $url");
    //die();
}