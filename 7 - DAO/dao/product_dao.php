<?php

class product_dao {
    //all field names in the table
    public $id;
    public $name;
    public $description;
    public $price;

    //list of products
    public $products;

    private $_host;
    private $_username;
    private $_password;
    private $_db;
    private $_query;
    private $_dbh;
    private $_stmt;
    private $_error;

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
        try {
            $dsn = "mysql:host=$this->_host; dbname=$this->_db";
            $this->_dbh = new PDO($dsn, $this->_username, $this->_password);
        } catch (PDOException $e) {
            $this->_error = $e->getMessage();
        }
    }

    //so we can get the connection error
    public function get_error() {
        return $this->_error;
    }

    //a function that looks up a product by ID
    public function find_product_by_id() {
        try {
            $this->_query = 'SELECT * FROM `products` WHERE `id` = ?';
            $this->_stmt = $this->_dbh->prepare($this->_query);
            $this->_stmt->execute([$this->id]);
        } catch (Exception $e) {
            $this->_error = $e->getMessage();
        }

        $result = $this->_stmt->fetchObject();

        $this->name = $result->name;
        $this->description = $result->description;
        $this->price = $result->price;
    }

    public function insert_product() {
        $result = false;
        try {
            $this->_query = "INSERT INTO `products` (`name`, `description`, `price`) VALUES (?, ?, ?)";
            $this->_stmt = $this->_dbh->prepare($this->_query);
            $result = $this->_stmt->execute([
                $this->name,
                $this->description,
                $this->price
            ]);
            $this->id = $this->_dbh->lastInsertId();
        } catch (Exception $e) {
            $this->_error = $e->getMessage();
        }

        return $result;
    }

    /**
     * @return array
     */
    public function list_all_products() {
        try {
            $this->_query = 'SELECT * FROM `products`';
            $this->_stmt = $this->_dbh->prepare($this->_query);
            $this->_stmt->execute();
        } catch (Exception $e) {
            $this->_error = $e->getMessage();
        }

        $this->products = $this->_stmt->fetchAll(PDO::FETCH_OBJ);
    }


}
