<?php

class database {
    private $_username;
    private $_password;
    private $_db;
    private $_host;

    private $_query;
    private $_dbh;

    public function __construct($query) {
        $this->_query = $query;
        $this->setParameters();
        $this->connectDatabase();
    }

    private function setParameters() {
        $this->_username = 'fit2104';
        $this->_password = 'fit2104';
        $this->_db = 'fit2104_22s2_lecture07';
        $this->_host = 'localhost';
    }

    private function connectDatabase() {
        $dsn = "mysql:host=$this->_host;dbname=$this->_db";
        $this->_dbh = new PDO($dsn, $this->_username, $this->_password);
    }

    public function executeQuery() {
        $stmt = $this->_dbh->prepare($this->_query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}