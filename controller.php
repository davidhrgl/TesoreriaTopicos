<?php
    require_once "model.php";
    //Recibe el JSON
    $json_str = file_get_contents('php://input');
    //Regresa el JSON a un Array
    //$json_array = json_decode($json_str,true);
    //Regresa el JSON a un Objeto
    $json_obj = json_decode($json_str);
    $obj = new stdClass();

    switch ($json_obj->funcname) {
        case 'getEmpleados':
                $obj->data = getEmpleados();
            break;
        
        default:
            # code...
            break;
    }
    /* Regresamos la Data*/
    header('Content-Type: application/json');
    echo json_encode($obj);
?>