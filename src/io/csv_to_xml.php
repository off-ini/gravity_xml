<?php

//$CSV_FILE = "../../data/Gravity_V202211.csv";
//$OUTPUT_FILE = "../../data/gravity.xml";

function csv_to_xml($CSV_FILE, $OUTPUT_FILE){
    if(!file_exists($CSV_FILE)) return false;

    $file = fopen($CSV_FILE, 'r');

    if($file != null){
        $doc = new DOMDocument();
        $doc->formatOutput = true;

        $root = $doc->createElement('gravities');
        $root = $doc->appendChild($root);

        $index = 0;
        $headers = null;
        while (($line = fgetcsv($file, 0, ';')) !== FALSE) {
        
        if($index == 0) $headers = $line;
        else if($headers != null){

            $gravity = $doc->createElement("gravity");
            $root->appendChild($gravity);

            $el = $doc->createElement("gravity_id");
            $el->nodeValue= bin2hex(openssl_random_pseudo_bytes(16));
            $gravity->appendChild($el);

            for($i = 0; $i < count($headers); $i++){
                $el = $doc->createElement(str_replace("\xEF\xBB\xBF",'',$headers[$i]));
                $el->nodeValue= $line[$i];
                $gravity->appendChild($el);
            }
        }

        $index++;
        }
        fclose($file);

        $doc->save($OUTPUT_FILE);

        return true;
    }
}

//csv_to_xml($CSV_FILE, $OUTPUT_FILE);