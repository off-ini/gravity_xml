<?php

include("./db.php");

$FILE_XML = "../../data/gravity.xml";

if(file_exists($FILE_XML)){
    $xml = simplexml_load_file($FILE_XML);

    $sql = "INSERT INTO atomes (numero, 
                                symbole, 
                                nom, 
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse,
                                masse, 
                                type) 
            VALUE (?,?,?,?,?);";

    $sql_preper = $CON->prepare($sql);

    foreach($xml as $el){
        $sql_preper->execute([
            $el->numero,
            $el->symbole,
            $el->nom,
            $el->masse,
            $el->attributes()['type']
        ]);
    }

}else echo 'Echec d\'ouverture du fichier';

$CON->close();