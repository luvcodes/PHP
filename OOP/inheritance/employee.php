<?php
require_once ('person.php');
class Employee extends Person {
    protected $_position;

    public function __construct($firstname, $lastname, $position)
    {
        $this->_position = $position;
        parent::__construct($firstname, $lastname);
    }
    public function set_position($position) {
        $this->_position = $position;
    }

    public function get_position() {
        return $this->_position;
    }
}
