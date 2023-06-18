<?php

function afficher_elements_xml($xml_string) {
    $xml = simplexml_load_string($xml_string);
    $elements = [];

    $result = $xml->xpath('//*'); // Sélectionne tous les éléments XML
    foreach ($result as $element) {
        $elements[] = $element->getName();
    }

    return $elements;
}


$xml_data = '<?xml version="1.0" encoding="utf-8" ?>
<gravities>
    <gravity>
        <gravity_id>d0f109e1b56b2f0bb324bf0778ab2e53</gravity_id>
        <year></year>
        <country_id_o></country_id_o>
        <country_id_d></country_id_d>
        <distw_harmonic></distw_harmonic>
        <distw_arithmetic></distw_arithmetic>
        <dist></dist>
        <distcap></distcap>
        <contig></contig>
        <comlang_off></comlang_off>
        <comcol></comcol>
        <comrelig></comrelig>
        <pop_o></pop_o>
        <pop_d></pop_d>
        <gdp_o></gdp_o>
        <gdp_d></gdp_d>
        <pop_pwt_o></pop_pwt_o>
    </gravity>
     <gravity>
        <gravity_id>89389fc5237153716b02bc150ed9f12a</gravity_id>
        <year></year>
        <country_id_o></country_id_o>
        <country_id_d></country_id_d>
        <distw_harmonic></distw_harmonic>
        <distw_arithmetic></distw_arithmetic>
        <dist></dist>
        <distcap></distcap>
        <contig></contig>
        <comlang_off></comlang_off>
        <comcol></comcol>
        <comrelig></comrelig>
        <pop_o></pop_o>
        <pop_d></pop_d>
        <gdp_o></gdp_o>
        <gdp_d></gdp_d>
        <pop_pwt_o></pop_pwt_o>
    </gravity>
</gravities>';

$elements_xml = afficher_elements_xml($xml_data);
print_r($elements_xml);

?>
