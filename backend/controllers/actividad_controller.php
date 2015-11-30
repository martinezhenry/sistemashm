<?php
//require_once 'D:/Mis Documentos en Local/sistemashm/backend/models/Actividad.php';
require_once '../backend/models/Actividad.php';
function getActividades($id = null){
	
	$act = new Actividad();

 	if (isset($id)) return json_encode($act->getActividad($id));
 	 return json_encode($act->getActividades());



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