<?php

//require_once 'D:/Mis Documentos en Local/sistemashm/backend/models/Actividad.php';
require_once '../backend/models/Actividad.php';
require_once '../backend/core/Configurator.php';

require_once '../backend/core/DBInspector.php';


  define('__CERO__',0);

 //var_dump($validFields);
global $act, $validFields, $dbInspector;
$act = new Actividad();

  $validFields = array(
    
     'id' => 'id',
     'descripcion' => 'desc',
    'fec_act_in' => 'fecha_act',
    'cant_hrs' => 'horas',
    'precio_unidad' => 'precio',
    'ln_clientes_id' => 'cliente'
    
    
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

    GeneratorResponse::getInstancia()->setData((isset($data)) ? $data : null);
    GeneratorResponse::getInstancia()->setStatus(200);
    GeneratorResponse::getInstancia()->makeResponse();
    //var_dump (GeneratorResponse::getInstancia()->getResponse());
    return GeneratorResponse::getInstancia()->getResponse();
}

function createActividad($data) {

    global $act, $dbInspector, $validFields;
    $data = GeneratorResponse::getInstancia()->cleanDataPost($data);
    //  var_dump($validFields);
    $dbInspector->getDescribeTable();
    
    $campos = array_keys($dbInspector->getFields());
    
    echo "camposssssssssssssssss ";
    
    
    
    var_dump(array_intersect_key(array_keys($dbInspector->getFields()), array_keys($validFields)));
    
    
    
    (validateFields($data))? $act->createActividad($data, $campos):'no valido';
    
    return json_encode(array('method' => 'create', 'data' => array($data)));
}


function validateFields($fields){
    global $validFields, $dbInspector;
    
    
          
        
        $dbInspector->getDescribeTable();
        
     //   var_dump($dbInspector->getDescribe());
        
        echo "/***************************/";
        
       /// var_dump($dbInspector->getFields());
        
        
    
    
    if (is_array($fields) && count($fields) > __CERO__ && count($fields) <= count($dbInspector->getFields()) ){
        
        foreach ($fields as $key => $value) {
            echo "key: " .$key;
            var_dump($validFields);
            if ($validFields[strtolower($key)] == null && strcmp($validFields[strtolower($key)],"") === 0){
                
                return FALSE;
                
            }
            
        }
    return TRUE;    
    }
    
    return FALSE;
    
    
    
}


function updateActividad($id, $data) {

    return json_encode(array('method' => 'update', 'id' => $id, 'data' => array($data)));
}

function deleteActividad($id) {

    return json_encode(array('method' => 'delete', 'id' => $id));
}
