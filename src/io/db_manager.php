<?php

//include("./db.php");

//$FILE_XML = "../../data/gravity.xml";

function xml_to_db($CON, $FILE_XML){
    
    try{
        if(file_exists($FILE_XML)){
            $xml = simplexml_load_file($FILE_XML);
        
            $sql = "INSERT INTO gravity (gravity_id, 
                                        year, 
                                        country_id_o, 
                                        country_id_d,
                                        distw_harmonic,
                                        distw_arithmetic,
                                        dist,
                                        distcap,
                                        contig,
                                        comlang_off,
                                        comcol,
                                        comrelig,
                                        pop_o,
                                        pop_d,
                                        gdp_o,
                                        gdp_d, 
                                        pop_pwt_o) 
                    VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        
            $sql_preper = $CON->prepare($sql);
        
            foreach($xml as $el){
                $sql_preper->execute([
                    $el->gravity_id,
                    $el->year,
                    $el->country_id_o,
                    $el->country_id_d,
                    $el->distw_harmonic,
                    $el->distw_arithmetic,
                    $el->dist,
                    $el->distcap,
                    $el->contig,
                    $el->comlang_off,
                    $el->comcol,
                    $el->comrelig,
                    $el->pop_o,
                    $el->pop_d,
                    $el->gdp_o,
                    $el->gdp_d,
                    $el->pop_pwt_o
                ]);
            }
        
        }else echo 'Echec d\'ouverture du fichier';

        return true;
    }catch(Exception $e){
        echo "INSERT ERROR : ".$e;
        return false;
    }
}

function db_to_xml($CON, $FILE_OUTPUT="gravity.xml"){

    try{
        $sql = "SELECT gravity_id, 
            year, 
            country_id_o, 
            country_id_d,
            distw_harmonic,
            distw_arithmetic,
            dist,
            distcap,
            contig,
            comlang_off,
            comcol,
            comrelig,
            pop_o,
            pop_d,
            gdp_o,
            gdp_d, 
            pop_pwt_o 
        FROM gravity;";

        $doc = new DOMDocument();
        $doc->formatOutput = true;

        $root = $doc->createElement('gravities');
        $root = $doc->appendChild($root);

        foreach($CON->query($sql) as $row){
            $gravity = $doc->createElement("gravity");
            $root->appendChild($gravity);

            foreach($row as $key => $value){
                if(!is_int($key)){
                    $el = $doc->createElement($key);
                    $el->nodeValue= $value;
                    $gravity->appendChild($el); 
                }
            }
        }

        $doc->save($FILE_OUTPUT);
        return true;
    }catch(Exception $e){
        echo "CREATE FILE ERROR : ".$e;
        return false;
    }
    
}

function get_gravity($CON){
    $sql = "SELECT gravity_id, 
            year, 
            country_id_o, 
            country_id_d,
            distw_harmonic,
            distw_arithmetic,
            dist,
            distcap,
            contig,
            comlang_off,
            comcol,
            comrelig,
            pop_o,
            pop_d,
            gdp_o,
            gdp_d, 
            pop_pwt_o 
        FROM gravity;";
 return $CON->query($sql);
}

//xml_to_db($CON, $FILE_XML);
//db_to_xml($CON);