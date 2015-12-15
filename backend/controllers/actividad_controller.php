<?php

//require_once 'D:/Mis Documentos en Local/sistemashm/backend/models/Actividad.php';
require_once '../backend/models/Actividad.php';
require_once '../backend/core/Configurator.php';

require_once '../backend/core/DBInspector.php';


define('__CERO__', 0);

//var_dump($validFields);
global $act, $validFields, $dbInspector;
$act = new Actividad();

$validFields = array(
    'id' => 'id',
    'desc' => 'descripcion',
    'fecha_act' => 'fec_act_in',
    'horas' => 'cant_hrs',
    'precio' => 'precio_unidad',
    'cliente' => 'ln_clientes_id'
);

$dbInspector = new DBInspector("LN_ACTIVIDADES");

function getActividades($id = null) {

    //Configurator::getInstance();
    global $act;

    $resultSet = $act->getActividad($id);

    if (isset($resultSet)) {

        foreach ($resultSet as $fila) {

            $data[] = $fila;
        }
    }
    
    if (isset($data)){
        GeneratorResponse::getInstancia()->setData($data);
        GeneratorResponse::getInstancia()->setStatus(200);
        
    } else {
        GeneratorResponse::getInstancia()->setData(null);
        GeneratorResponse::getInstancia()->setStatus(204);
    }

    GeneratorResponse::getInstancia()->setStatusMsg(GeneratorResponse::getInstancia()->getEstado()[GeneratorResponse::getInstancia()->getStatus()]);
    GeneratorResponse::getInstancia()->makeResponse();
    //var_dump (GeneratorResponse::getInstancia()->getResponse());
    return GeneratorResponse::getInstancia()->getResponse();
}

function createActividad($data) {

    global $act, $dbInspector, $validFields;
    $data = GeneratorResponse::getInstancia()->cleanDataPost($data);

    $dbInspector->getDescribeTable();

    $campos = array_intersect(array_keys($dbInspector->getFields()), array_keys($data));
   
    $count = (validateFields($data)) ? $act->createActividad($data, $campos) : -1;
    
    $data = array(
        'cant' => $count
        );
    
    if ($count == -1){
        
         $data['msg'] = 'Campos de petición no validos.';
         unset($data['cant']);
        //GeneratorResponse::getInstancia()->setStatus(400);
       // $data['error'] = DBManagement::getInstance()->getUltError();
        
    } else if ($count > 0) {
        $data['msg'] = 'Objeto Creado.';
         GeneratorResponse::getInstancia()->setStatus(201);
    } else {
        $data['msg'] = 'Objeto No Creado.';
        GeneratorResponse::getInstancia()->setStatus(400);
        $data['error'] = DBManagement::getInstance()->getUltError();
    }
    
    GeneratorResponse::getInstancia()->setStatusMsg(GeneratorResponse::getInstancia()->getEstado()[GeneratorResponse::getInstancia()->getStatus()]);
    GeneratorResponse::getInstancia()->setData((isset($data)) ? $data : null);
   
    GeneratorResponse::getInstancia()->makeResponse();
    
    return GeneratorResponse::getInstancia()->getResponse();
}

function validateFields($fields) {
    global $validFields, $dbInspector;

    $dbInspector->getDescribeTable();

    if (is_array($fields) && count($fields) > __CERO__ && count($fields) <= count($dbInspector->getFields())) {
        foreach ($fields as $key => $value) {
            if ($validFields[strtolower($key)] == null && strcmp($validFields[strtolower($key)], "") === 0) {
                return FALSE;
            }
        }
        return TRUE;
    } else {
        GeneratorResponse::getInstancia()->setStatus(400);
        return FALSE;
    }

    return FALSE;
}

function addColons($data, $prefijo = ':' ) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {

            $newData[$prefijo . $key] = $value;
        }

        return $newData;
    } else {

        return FALSE;
    }
}

function updateActividad($id, $data) {

    return json_encode(array('method' => 'update', 'id' => $id, 'data' => array($data)));
}

function deleteActividad($id) {

    return json_encode(array('method' => 'delete', 'id' => $id));
}
