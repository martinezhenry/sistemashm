<?php

require_once '../backend/core/GeneratorResponse.php';

class Actividad {


	public function getActividad($id = null){

            
            $sql = 'SELECT * FROM LN_ACTIVIDADES WHERE  ID = \'' . mysql_real_escape_string($id) . '\'';
            
     

	}

}