<?php

    //Obtenemos todos los empleados
    function getEmpleados(){
        $tesoreria_xml = simplexml_load_file("data/tesoreria.xml");
        $id;
        $tipo;
        $nombre;
        $direccion;
        $telefono;
        $email;
        $empleados = array();
        $atributos = array();
        foreach ($tesoreria_xml->Empleados as $nempleados) 
        {
            foreach ($nempleados->Empleado as $nempleado) {
                $empleado = array();
                $atributos = $nempleado->attributes();
                $id = $atributos[IdEmpl];
                $tipo = $atributos[tipoEmp];
                $nombre = $nempleado->Nombre;
                $direccion = $nempleado->Direccion;
                $telefono = $nempleado->Tel;
                $email = $nempleado->Email;
                //Agregamos a un Array de Tipos de empleado
                array_push($empleado,$id);
                array_push($empleado,$tipo);
                array_push($empleado,$nombre);
                array_push($empleado,$direccion);
                array_push($empleado,$telefono);
                array_push($empleado,$email);
                //Agregamos cada empleado a Empleados
                array_push($empleados,$empleado);
                $id = $tipo = $nombre = $direccion = $telefono = $email = '';
            }
        }
        return $empleados;
    }


    //Parseamos los Saldos

    /*Obtenemos los Saldos*/
    function getSaldos(){
        $tesoreria_xml = simplexml_load_file("data/tesoreria.xml");
        $disponible;
        $fecha;
        $saldos = array();
        foreach ($tesoreria_xml->Saldo as $nsaldo) 
        {
            $saldo = array();
            $disponible = $nsaldo->Disponible;
            $fecha = $nsaldo->Fecha;
            //Agregamos al Saldo los elementos
            array_push($saldo,$disponible);
            array_push($saldo,$fecha);
            array_push($saldos,$saldo);
        }
        //var_dump($array);
    return $saldos;
    }

    /* Obtnemos los tipos de cambios*/
    function getCambios(){
        $tesoreria_xml = simplexml_load_file("data/tesoreria.xml");
        $dolar;
        $euro;
        $centenario;
        $onzaoro;
        $onzaplata;
        $cambios = array();
        foreach ($tesoreria_xml->TipoCambio as $ntipocambio) 
        {
            $cambio = array();
            $dolar = $ntipocambio->Dolar;
            $euro = $ntipocambio->Euro;
            $centenario = $ntipocambio->Centenario;
            $onzaoro = $ntipocambio->OnzaLibertadOro;
            $onzaplata = $ntipocambio->OnzaLibertadPlata;
            //Agregamos a un Array de Tipos de Cambios
            array_push($cambio,$dolar);
            array_push($cambio,$euro);
            array_push($cambio,$centenario);
            array_push($cambio,$onzaoro);
            array_push($cambio,$onzaplata);
            //Agregamos al Array de Cambios
            array_push($cambios,$cambio);
        }
        return $cambios;
    }




?>