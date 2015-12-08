<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GeneratorResponse {
    
    
    private static $instancia;
    private $data;
    private $response;
    private $status;
    
    
    private function __construct() {
        
    }
    
    public static function getInstancia() {
        
        return (isset(self::$instancia)) ? self::$instancia : self::$instancia = new GeneratorResponse();
        
    }
    
    public function makeResponse(){
        
        $this->setResponse(json_encode(array ('status' => $this->status, 'data' => $this->getData())));

        }
    
    function getData() {
        return $this->data;
    }

    function getResponse() {
        return $this->response;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setResponse($response) {
        $this->response = $response;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }


}