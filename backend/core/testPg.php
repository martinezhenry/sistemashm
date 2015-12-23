<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './DBManagement.php';


$db = DBManagement::getInstance();




$db->setHost('localhost');
$db->setUser('root');
$db->setPass('');
$db->setType('mysql');
$db->setDbname('');



$sql = "SELECT CURRENT_STAMP FROM DUAL";

$db->consultar($sql);


var_dump($db->getResultset());



