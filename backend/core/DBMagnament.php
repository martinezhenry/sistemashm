<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DBMagnament {
    
    private $host;
    private $user;
    private $pass;
    private $schema;
    private $conn;
    private $pdo;
    private $type;
    private $charset;
    private $dbName;
    private $dns;
    private static $instance;
    
    
    
    private function __construct() {
       // self::$instance = new DBMagnament();
            
    }
    
       
    public function connect(){
        
        try {
        if (!isset($this->conn)){
            
            $this->dns = "$this->type:host=$this->host;dbname=$this->dbName";
            //echo $this->dns;
            $this->conn = new PDO($this->dns, $this->user, $this->pass);
            
        }
        
        }  catch (PDOException $ex){
            
            echo "¡ERROR!: " . $ex->getMessage();
            
        }
        
        
    }
    
    
    public function consultar(){
        
        $sql = "SELECT CURRENT_TIMESTAMP FROM DUAL";
        
        $this->connect();
        
        foreach($this->conn->query('SELECT * from ln_clientes') as $fila) {
        print_r($fila);
    }
    $this->conn = null;
        
        
    }
    
    
    public static function getInstance() {
        if (isset(self::$instance)) {
        return self::$instance;
        } else {
            
            return self::$instance = new DBMagnament();
            
        }
    }

    static function setInstance($instance) {
        self::$instance = $instance;
    }

    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getSchema() {
        return $this->schema;
    }

    function getConn() {
        return $this->conn;
    }

    function getPdo() {
        return $this->pdo;
    }

    function getType() {
        return $this->type;
    }

    function getCharset() {
        return $this->charset;
    }

    function getDbName() {
        return $this->dbName;
    }

    function getDns() {
        return $this->dns;
    }

    function setHost($host) {
        $this->host = $host;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setSchema($schema) {
        $this->schema = $schema;
    }

    function setConn($conn) {
        $this->conn = $conn;
    }

    function setPdo($pdo) {
        $this->pdo = $pdo;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setCharset($charset) {
        $this->charset = $charset;
    }

    function setDbName($dbName) {
        $this->dbName = $dbName;
    }

    function setDns($dns) {
        $this->dns = $dns;
    }


    
    
}