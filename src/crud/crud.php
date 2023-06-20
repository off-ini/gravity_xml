<?php
    function get_el($FILE, $ID){
        $el = null;
        if(file_exists($FILE)){
            $dom = new DOMDocument();
            $dom->load($FILE);
            $xmlObject = $dom->getElementsByTagName("gravity");

            $nb = $xmlObject->length;

            for($i = 0; $i < $nb; $i++){
                $id = $xmlObject->item($i)->getElementsByTagName("gravity_id")->item(0)->nodeValue;
                if($id == $ID){
                    $el = $xmlObject->item($i);
                    break;
                }
            }
        }
        return $el;
    }

    function add_el($FILE, $element){
        $gravity = null;
        if(file_exists($FILE)){
            $dom = new DOMDocument();
            $dom->formatOutput = true;
            $dom->load($FILE);
            $xmlObject = $dom->getElementsByTagName("gravities");

            $gravity = $dom->createElement("gravity");
            $xmlObject->item(0)->appendChild($gravity);

            foreach($element as $key => $value){
                $el = $dom->createElement($key);
                $el->nodeValue= $value;
                $gravity->appendChild($el);
            }

            if($el != null)
                $dom->save($FILE);
        }
        

        return $gravity;
    }

    function update_el($FILE, $element){
        $el = null;
        if(file_exists($FILE)){
            $dom = new DOMDocument();
            $dom->formatOutput = true;
            $dom->load($FILE);
            $xmlObject = $dom->getElementsByTagName("gravity");

            $nb = $xmlObject->length;

            for($i = 0; $i < $nb; $i++){
                $id = $xmlObject->item($i)->getElementsByTagName("gravity_id")->item(0)->nodeValue;
                if($id == $element['gravity_id']){
                    $el = $xmlObject->item($i);
                    foreach($element as $key => $value){
                        $xmlObject->item($i)->getElementsByTagName($key)->item(0)->nodeValue = $value;
                    }
                    break;
                }
            }

            if($el != null)
                $dom->save($FILE);
        }
        

        return $el;
    }

    function delete_el($FILE, $ID){
        $el = null;
        if(file_exists($FILE)){
            $doc = new DOMDocument();
            $doc->load($FILE);
            $dom = $doc->documentElement;
            $xmlObject = $dom->getElementsByTagName("gravity");

            $nb = $xmlObject->length;

            for($i = 0; $i < $nb; $i++){
                $id = $xmlObject->item($i)->getElementsByTagName("gravity_id")->item(0)->nodeValue;
                if($id == $ID){
                    $el = $xmlObject->item($i);
                    break;
                }
            }

            $dom->removeChild($el);
            
            if($el != null)
                $doc->save($FILE);
        }

        return $el;
    }
?>