<?php
$saldo = array();
$
$tesoreria_xml = simplexml_load_file("data/tesoreria.xml");
//Obtenemos los Saldos
foreach ($tesoreria_xml->Saldo as $nsaldo) 
	{
    array_push($saldo,$nsaldo);
    }
    
foreach ($saldo as $value) {
    echo($value);
}
?>