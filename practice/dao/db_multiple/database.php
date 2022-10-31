<?php
class database {
    private $_host;
    private $_username;
    private $_password;
    private $_db;

    private $_query;
    private $_dbh;
    private $_stmt;

    private $_type;
    private $_values;

    public function __construct() {
        $this->setParameters();
        $this->connectDatabase();
    }

    private function setParameters() {
        $this->_host = "localhost";
        $this->_username = "fit2104";
        $this->_password = "fit2104";
        $this->_db = "fit2104_22s2_lecture07";
    }
    private function connectDatabase() {
        $dsn = "mysql:host=$this->_host;dbname=$this->_db";
        $this->_dbh = new PDO($dsn, $this->_username, $this->_password);
    }

    public function set_query($query) {
        $this->_query = $query;
        $this->_stmt = $this->_dbh->prepare($this->_query);
    }
    public function get_query() {
        return $this->_query;
    }

    public function set_type($type) {
        $this->_type = $type;
    }
    public function set_values($values) {
        $this->_values = $values;
    }

    public function executeQuery() {
        switch ($this->_type) {
            case "insert":
                $this->_stmt = execute($this->_values);
                return true;
            case "list":
                $this->_stmt->execute();
                return $this->_stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function __destruct() {
        $this->_stmt->closeCursor();
    }

}
