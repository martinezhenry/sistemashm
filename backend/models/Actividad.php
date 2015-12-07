<?php

require_once '../backend/core/GeneratorResponse.php';

class Actividad {


	public function getActividad($id = null){

            
            $sql = 'SELECT * FROM LN_ACTIVIDADES WHERE  ID = \'' . mysql_real_escape_string($id) . '\'';
            
            GeneratorResponse::getInstancia()->setData(array('este es algo' => 'este es la respousta'));
            GeneratorResponse::getInstancia()->setStatus(200);
            GeneratorResponse::getInstancia()->makeResponse();

	}

}