<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../backend/core/DBManagement.php';



$sql = "SELECT * FROM `TABLE 1` EMP ORDER BY CEDULA_EMP";

$db = DBManagement::getInstance();
        
$db->setHost('localhost');
$db->setUser('root');
$db->setPass('');
$db->setType('mysql');
$db->setDbname('hmtest');
//$db->setPort('');
$paso = 0;        

$db->consultar($sql, null);

$result = $db->getResultSet();


foreach ($result as $key => $value) {
   /// echo "-------------------------------------------------------------------------<br>";
   echo "<br>EMPLEADO:<br>";
   
    echo "SINO|INST_ANT|N_HIJO|NIVEL|CANTI|TIPOEO|CODPERS|CODCONT|INST_EMP|ESTABLEC|"
    . ""
            . "CODGRE|CODSER|COD_ESTABL|CODIGO_EMP|CEDULA_EMP|NOMBRE_EMP|DIRECCION|TELEFONO|FECHA_NACI|SEXO"
            . ""
            . "|CARGAS_EMP|STATUS_EMP|COND_STATU|UBICACION|CODIGO_CAR|CLASE|CARGO_ACTU|CODTAB|TABLA|GRADO_EMP|PASO_EMP|HORA|FECHA_INGR|FECHA_EGRE|FECHA_VACA|FECHA_ADMP"
            . ""
            . "|FECHA_ESTA|FECHA_REIN|CORTE|TIPO_CONTR|FECHA_INI|FECHA_FIN|EDAD|ASERV|BLOQUEO|TCBAN|CODBAN|CUENTA_BAN|LUGAR_DE_P|FECHA_MOVI|"
            . "SUELDO|SDIARIO|SINTEGRAL|SINTACUM|SIDIARIO|NETOI|NETOII|NETOG|SSOE|SSOER|PFE|"
            . "PFER|LPHE|LPHER|FPJE|FPJER|SSOP|"
            . "SSOPR|PFP|PFPR|LPHP|LPHPR|FPJP|"
            . "FPJPR|SSOERD|LPHERD|FPJERD|PFERD|SSOPRD|"
            . "LPHPRD|FPJPRD|PFPRD|SSOERDI|LPHERDI|FPJERDI|"
            . "PFERDI|SSOPRDI|LPHPRDI|FPJPRDI|TPER|PFPRDI|"
            . "DIAS_VACA|NETODEP|ASI|DED|KEILA|CARGO_ANT|"
            . "GRADO_ANT|PASO_ANT|HORA_ANT|FECHA_ANT|CARGO<br>";
   
    //echo "-------------------------------------------------------------------------<br>";
    echo  $value['SINO']. '|' . $value['INST_ANT']. '|' . $value['N_HIJO']. '|' . $value['NIVEL']. '|' . $value['CANTI']. '|' . $value['TIPOEO']. '|' . 
          $value['CODPERS']. '|' . $value['CODCONT']. '|' . $value['INST_EMP']. '|' . $value['ESTABLEC']. '|' . $value['CODGRE']. '|' . $value['CODSER']. '|' . 
          $value['COD_ESTABL']. '|' . $value['CODIGO_EMP']. '|' . $value['CEDULA_EMP']. '|' . $value['DIRECCION']. '|' . $value['TELEFONO']. '|' . $value['FECHA_NACI']. '|' .   
          $value['SEXO']. '|' . $value['CARGAS_EMP']. '|' . $value['STATUS_EMP']. '|' . $value['COND_STATU']. '|' . $value['UBICACION']. '|' . $value['CODIGO_CAR']. '|' .   
          $value['CLASE']. '|' . $value['CARGO_ACTU']. '|' . $value['CODTAB']. '|' . $value['TABLA']. '|' . $value['GRADO_EMP']. '|' . $value['PASO_EMP']. '|' .   
          $value['HORA']. '|' . $value['FECHA_INGR']. '|' . $value['FECHA_EGRE']. '|' . $value['FECHA_VACA']. '|' . $value['FECHA_ADMP']. '|' . $value['FECHA_ESTA']. '|' .   
          $value['FECHA_REIN']. '|' . $value['CORTE']. '|' . $value['TIPO_CONTR']. '|' . $value['FECHA_INI']. '|' . $value['FECHA_FIN']. '|' . $value['EDAD']. '|' .
          $value['ASERV']. '|' . $value['BLOQUEO']. '|' . $value['TCBAN']. '|' . $value['CODBAN']. '|' . $value['CUENTA_BAN']. '|' . $value['LUGAR_DE_P']. '|' .
          $value['FECHA_MOVI']. '|' . $value['SUELDO']. '|' . $value['SDIARIO']. '|' . $value['SINTEGRAL']. '|' . $value['SINTACUM']. '|' . $value['SIDIARIO']. '|' .
          $value['NETOI']. '|' . $value['NETOII']. '|' . $value['NETOG']. '|' . $value['SSOE']. '|' . $value['SSOER']. '|' . $value['PFE']. '|' . 
          $value['PFER']. '|' . $value['LPHE']. '|' . $value['LPHER']. '|' . $value['FPJE']. '|' . $value['FPJER']. '|' . $value['SSOP']. '|' . 
          $value['SSOPR']. '|' . $value['PFP']. '|' . $value['PFPR']. '|' . $value['LPHP']. '|' . $value['LPHPR']. '|' . $value['FPJP']. '|' . 
          $value['FPJPR']. '|' . $value['SSOERD']. '|' . $value['LPHERD']. '|' . $value['FPJERD']. '|' . $value['PFERD']. '|' . $value['SSOPRD']. '|' . 
          $value['LPHPRD']. '|' . $value['FPJPRD']. '|' . $value['PFPRD']. '|' . $value['SSOERDI']. '|' . $value['LPHERDI']. '|' . $value['FPJERDI']. '|' . 
          $value['PFERDI']. '|' . $value['SSOPRDI']. '|' . $value['LPHPRDI']. '|' . $value['FPJPRDI']. '|' . $value['TPER']. '|' . $value['PFPRDI']. '|' . 
          $value['DIAS_VACA']. '|' . $value['NETODEP']. '|' . $value['ASI']. '|' . $value['DED']. '|' . $value['KEILA']. '|' . $value['CARGO_ANT']. '|' . 
          $value['GRADO_ANT']. '|' . $value['PASO_ANT']. '|' . $value['HORA_ANT']. '|' . $value['FECHA_ANT']. '|' . $value['CARGO']. 
            "<br><br>";
    //var_dump($value);
    $ci = $value['CEDULA_EMP'];
    $cod = $value['CODIGO_EMP'];
    
    echo "";
    
    
    $sql2 = "select * from `table 2` asigp where cedula_ad = '$ci' and codigo_ad = '$cod' order by cedula_ad;";
    
    $db->consultar($sql2, null);
    $result2 = $db->getResultSet();
    if ($result2 != NULL) {
    echo "DATOS DEL EMPLEADO:<br>";
    //echo "-------------------------------------------------------------------------<br>";
   // if ($paso == 0){
    echo "SINO|TIPOEO|CODPERS|CODCONT|INST_AD|CODIGO_AD|CEDULA_AD|CONCEPTO_A|CODCCAL|CODINTP|TIPO_APLIC|TIPO_CONCE|CANTI_AD|PORCE_AD|DMA|MONTO_AD|PORCE_D|NSEMANA|FECHA_APLI|NETO|IME|BA|FPI|FA|TPER|NETOE<br>";
    //}
    //echo "-------------------------------------------------------------------------<br>";
    foreach ($result2 as $key2 => $value2) {
        
        echo implode($value2,'|') . "<br>";
        
    }
    
    }
    
    
    
    
   // echo "***************************************************************************<br>";
}





