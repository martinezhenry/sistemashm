<?php
//require_once 'D:/Mis Documentos en Local/sistemashm/backend/models/Actividad.php';
require_once '../backend/models/Actividad.php';

function getActividades($id = null){
	
	$act = new Actividad();

       
         GeneratorResponse::getInstancia()->setData(array('este es algo' => 'este es la respousta'));
         GeneratorResponse::getInstancia()->setStatus(200);
         GeneratorResponse::getInstancia()->makeResponse();
 	 
 	 return json_encode(GeneratorResponse::getInstancia()->getResponse());



}


function createActividad($data){

	return json_encode(array('method' => 'create', 'data' => array($data)));

}


function updateActividad($id, $data){

	return json_encode(array('method' => 'update', 'id' => $id, 'data' => array($data)));

}



function deleteActividad($id){

	return json_encode(array('method' => 'delete', 'id' => $id));

}