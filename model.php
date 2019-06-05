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


        //Obtenemos todo los Clientes
        function getClientes(){
        $tesoreria_xml = simplexml_load_file("data/tesoreria.xml");
        $id;
        $nombre;
        $direccion;
        $telefono;
        $email;
        $clientes = array();
        $atributos = array();
        foreach ($tesoreria_xml->Clientes as $nclientes) 
        {
            foreach ($nclientes->Cliente as $ncliente) {
                $cliente = array();
                $atributos = $ncliente->attributes();
                $id = $atributos[IdCliente];
                $nombre = $ncliente->Nombre;
                $direccion = $ncliente->Direccion;
                $telefono = $ncliente->Tel;
                $email = $ncliente->Email;
                //Agregamos a un Array de Tipos de cliente
                array_push($cliente,$id);
                array_push($cliente,$nombre);
                array_push($cliente,$direccion);
                array_push($cliente,$telefono);
                array_push($cliente,$email);
                //Agregamos cada cliente a clientes
                array_push($clientes,$cliente);
                $id  = $nombre = $direccion = $telefono = $email = '';
            }
        }
        return $clientes;
    }


    //Obtenemos todo los Proveedors
        function getProveedors(){
        $tesoreria_xml = simplexml_load_file("data/tesoreria.xml");
        $id;
        $nombre;
        $direccion;
        $telefono;
        $email;
        $proveedors = array();
        $atributos = array();
        foreach ($tesoreria_xml->Proveedores as $nproveedores) 
        {
            foreach ($nproveedores->Proveedor as $nproveedor) {
                $proveedor = array();
                $atributos = $nproveedor->attributes();
                $id = $atributos[IdProv];
                $nombre = $nproveedor->Nombre;
                $direccion = $nproveedor->Direccion;
                $telefono = $nproveedor->Tel;
                $email = $nproveedor->Email;
                //Agregamos a un Array de Tipos de proveedor
                array_push($proveedor,$id);
                array_push($proveedor,$nombre);
                array_push($proveedor,$direccion);
                array_push($proveedor,$telefono);
                array_push($proveedor,$email);
                //Agregamos cada proveedor a proveedors
                array_push($proveedors,$proveedor);
                $id  = $nombre = $direccion = $telefono = $email = '';
            }
        }
        return $proveedors;
    }

?>