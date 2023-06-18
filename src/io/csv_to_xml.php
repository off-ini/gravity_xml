<?php

$doc = new DOMDocument();
$doc->formatOutput = true;

$root = $doc->createElement('gravities');
$root = $doc->appendChild($root);

$file = fopen('../../data/Gravity_V202211.csv', 'r');
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

$doc->save('../../data/gravity.xml');