<?php

class database {
    /**
     * @var $_dbh PDO PDO object
     * @var $_stmt PDOStatement PDO statement
     */

    //those are required properties in the class
    private $_username;
    private $_password;
    private $_db;
    private $_host;
    private $_query;
    private $_dbh;
    private $_stmt;

    //we've added two new properties
    private $_type;
    private $_values;

    //initialize the object
    public function __construct() {
        $this->setParameters();
        $this->connectDatabase();
    }

    //set up required parameters for DB connection
    private function setParameters() {
        $this->_username = 'fit2104';
        $this->_password = 'fit2104';
        $this->_db = 'fit2104_22s2_lecture07';
        $this->_host = 'localhost';
    }

    //initialise database connection
    private function connectDatabase() {
        $dsn = "mysql:host=$this->_host; dbname=$this->_db";
        $this->_dbh = new PDO($dsn, $this->_username, $this->_password);
    }

    //setup query using mutator
    public function set_query($query) {
        $this->_query = $query;
        $this->_stmt = $this->_dbh->prepare($this->_query);
    }

    public function get_query() {
        return $this->_query;
    }

    //setup query type using mutator
    public function set_type($type) {
        $this->_type = $type;
    }

    //set up the values to be executed
    public function set_values($values) {
        $this->_values = $values;
    }

    //execute the query based on type of query
    public function executeQuery() {
        switch ($this->_type) {
            case "insert":
                $this->_stmt->execute($this->_values);
                return true;
            case "list":
                $this->_stmt->execute();
                //retrieve and return an array of objects from database query
                return $this->_stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function __destruct() {
        $this->_stmt->closeCursor();
    }
}