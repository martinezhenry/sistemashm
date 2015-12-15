<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once 'Configurator.php';
class DBManagement {

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
    private $resultSet;
    private $countRows;
    private $ultError;
    private static $instance;

    private function __construct() {
        // self::$instance = new DBMagnament();
       // Configurator::getInstance();
    }

    public function connect() {

        try {
            if (!isset($this->conn)) {

                $this->dns = "$this->type:host=$this->host;dbname=$this->dbName;charset=$this->charset";
                
                $this->conn = new PDO($this->dns, $this->user, $this->pass);
            }
        } catch (PDOException $ex) {

            $this->ultError = $ex->getMessage();
        }
    }

    public function desconnect() {
        $this->conn = null;
    }

    public function consultar($sql, $arrBind = null) {

        // $sql = "SELECT CURRENT_TIMESTAMP FROM DUAL";

        $this->connect();

        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute($arrBind);
        
        $this->setResultSet($stmt->fetchAll());
        
        //$this->conn->query($sql, PDO::FETCH_ASSOC, $this->resultSet);


        $this->conn = null;
    }
    
    
    public function insertar($sql, $arrBind = null) {

        // $sql = "SELECT CURRENT_TIMESTAMP FROM DUAL";

        $this->connect();
        
        

        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute($arrBind);
        
        $this->setCountRows($stmt->rowCount());
        
        //$this->conn->query($sql, PDO::FETCH_ASSOC, $this->resultSet);
        
        if ($this->getCountRows() == 0){
            if (isset($stmt->errorInfo()[1])){
            $this->setUltError("Error al insertar en DB. Verifique los datos del Request.");
            }
            
        }
        

        $this->conn = null;
    }
    
    
    

    public static function getInstance() {
        if (isset(self::$instance)) {
            return self::$instance;
        } else {
            return self::$instance = new DBManagement();
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

    function getResultSet() {
        return $this->resultSet;
    }

    function setResultSet($resultSet) {
        $this->resultSet = $resultSet;
    }
    
    function getCountRows() {
        return $this->countRows;
    }

    function setCountRows($countRows) {
        $this->countRows = $countRows;
    }
    
    function getUltError() {
        return $this->ultError;
    }

    function setUltError($ultError) {
        $this->ultError = $ultError;
    }



}
