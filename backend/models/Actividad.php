<?php

require_once '../backend/core/DBManagement.php';
require_once '../backend/core/DBInspector.php';

class Actividad {

    public function getActividad($id = null) {

        (isset($id)) ?
                        $sql = 'SELECT * FROM LN_ACTIVIDADES WHERE  ID = ?' :
                        $sql = 'SELECT * FROM LN_ACTIVIDADES';

        DBManagement::getInstance()->consultar($sql, array(mysql_real_escape_string($id)));
        

        return DBManagement::getInstance()->getResultSet();
    }

    public function createActividad($data, $campos) {

       
        $sql = 'INSERT INTO LN_ACTIVIDADES ('.implode($campos, ', ').') '
                . 'VALUES '
                .'('.implode(array_keys($data), ', ').')';
        /*
                . '('.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data[''])
                . ','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data[''])
                . ','.mysql_real_escape_string($data['']).')';*/
        
       // echo $sql;

        DBManagement::getInstance()->insertar($sql, $data);

        return DBManagement::getInstance()->getCountRows();
    }
    
    


}
