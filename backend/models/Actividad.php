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
                .'( :'.implode(array_keys($data), ', :').')';
        /*
                . '('.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data[''])
                . ','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data[''])
                . ','.mysql_real_escape_string($data['']).')';*/
        
       // echo $sql;

        DBManagement::getInstance()->insertar($sql, $data);

        return DBManagement::getInstance()->getCountRows();
    }
    
    
     public function updateActividad($data, $campos) {

       
        
         $sets = "";
         (count($data) > 1) ? $coma = ', ' : $coma = '';
         foreach ($campos as $key => $value) {
             
             
             $sets .= $key . ' = ' . ':' . $value . $coma;
            
         }
            
         $sets = substr($sets, 0, -2);
   //        echo 'aquiiiiiii: ' .substr($sets, 0, -2);
         
         
         
         
        $sql = 'UPDATE LN_ACTIVIDADES SET '.$sets.' '
                . 'WHERE '
                .'ID = :id';
        /*
                . '('.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data[''])
                . ','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data['']).','.mysql_real_escape_string($data[''])
                . ','.mysql_real_escape_string($data['']).')';*/
        
      
        //        exit;

        DBManagement::getInstance()->insertar($sql, $data);
         
        return DBManagement::getInstance()->getCountRows();
    }
    
    
    public function deleteActividad($id) {

       
        $sql = 'DELETE FROM LN_ACTIVIDADES WHERE ID = ?';
        
        DBManagement::getInstance()->insertar($sql, array(mysql_real_escape_string($id)));

        return DBManagement::getInstance()->getCountRows();
    }


}
