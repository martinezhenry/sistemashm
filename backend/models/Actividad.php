<?php

class Actividad {


	public function getActividades(){

		return array ('data' => array('id' => '0', 'desc' => 'example'));

	}


	public function getActividad($id){

		return array ('data' => array('id' => $id, 'desc' => 'example'));

	}

}