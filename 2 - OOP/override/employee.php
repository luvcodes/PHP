<?php
require_once ('person.php');

class Employee extends Person {
    protected $_position;

    public function __construct($firstname, $lastname, $position)
    {
        // initialize the position variable
        $this->_position = $position;
        // initialize the firstname and lastname variables, parent class property with mutator
        $this->set_firstname($firstname);
        $this->set_lastname($lastname);
    }

    // override the firstname and lastname variables
    public function set_firstname($firstname) {$this->_firstname = strtoupper($firstname);}
    public function set_lastname($lastname) {$this->_lastname = strtoupper($lastname);}

    // setter and getter methods for the position variable
    public function set_position($position) {
        $this->_position = $position;
    }
    public function get_position() { return $this->_position; }
 }
