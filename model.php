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
?>