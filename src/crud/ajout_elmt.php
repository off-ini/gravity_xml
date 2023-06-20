<?php

function ajouter_element_xml($xml_string, $element_name, $element_value) {
    $xml = simplexml_load_string($xml_string);
    $gravities = $xml->addChild('gravity');
    $gravity_id = $gravities->addChild('gravity_id', $element_value);
    $gravity_id->addAttribute('id', $element_name);
    
    return $xml->asXML();
}

$xml_data = '<?xml version="1.0" encoding="utf-8" ?>
<gravities>
  <gravity>
    <gravity_id>711c2653b765618a6e63d33d0a27bc96</gravity_id>
    <year>1948</year>
    <country_id_o>TGO</country_id_o>
    <country_id_d>AGO</country_id_d>
    <distw_harmonic>2250</distw_harmonic>
    <distw_arithmetic>2270</distw_arithmetic>
    <dist>2126</dist>
    <distcap>2126</distcap>
    <contig>0</contig>
    <comlang_off>0</comlang_off>
    <comcol>0</comcol>
    <comrelig>0,213368997</comrelig>
    <pop_o></pop_o>
    <pop_d></pop_d>
    <gdp_o></gdp_o>
    <gdp_d></gdp_d>
    <pop_pwt_o></pop_pwt_o>
  </gravity>
  <gravity>
    <gravity_id>239c6ae163496529412d52eb19cc3892</gravity_id>
    <year>1949</year>
    <country_id_o>TGO</country_id_o>
    <country_id_d>AGO</country_id_d>
    <distw_harmonic>2250</distw_harmonic>
    <distw_arithmetic>2270</distw_arithmetic>
    <dist>2126</dist>
    <distcap>2126</distcap>
    <contig>0</contig>
    <comlang_off>0</comlang_off>
    <comcol>0</comcol>
    <comrelig>0,213368997</comrelig>
    <pop_o></pop_o>
    <pop_d></pop_d>
    <gdp_o></gdp_o>
    <gdp_d></gdp_d>
    <pop_pwt_o></pop_pwt_o>
  </gravity>
  <gravity>
    <gravity_id>5635a1287ba4182c1c12064549e82c29</gravity_id>
    <year>1950</year>
    <country_id_o>TGO</country_id_o>
    <country_id_d>AGO</country_id_d>
    <distw_harmonic>2250</distw_harmonic>
    <distw_arithmetic>2270</distw_arithmetic>
    <dist>2126</dist>
    <distcap>2126</distcap>
    <contig>0</contig>
    <comlang_off>0</comlang_off>
    <comcol>0</comcol>
    <comrelig>0,213368997</comrelig>
    <pop_o>1171,897</pop_o>
    <pop_d>4117,617</pop_d>
    <gdp_o></gdp_o>
    <gdp_d></gdp_d>
    <pop_pwt_o></pop_pwt_o>
  </gravity>
  <gravity>
    <gravity_id>7e4734227d7f725174d076af6e283540</gravity_id>
    <year>1951</year>
    <country_id_o>TGO</country_id_o>
    <country_id_d>AGO</country_id_d>
    <distw_harmonic>2250</distw_harmonic>
    <distw_arithmetic>2270</distw_arithmetic>
    <dist>2126</dist>
    <distcap>2126</distcap>
    <contig>0</contig>
    <comlang_off>0</comlang_off>
    <comcol>0</comcol>
    <comrelig>0,213368997</comrelig>
    <pop_o>1194,973</pop_o>
    <pop_d>4173,095</pop_d>
    <gdp_o></gdp_o>
    <gdp_d></gdp_d>
    <pop_pwt_o></pop_pwt_o>
  </gravity>
</gravities>';

$new_xml_data = ajouter_element_xml($xml_data, 'new_element', 'New Value');
echo $new_xml_data;

?>
