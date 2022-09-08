<?php
class Person {
    protected $_firstname;
    protected $_lastname;

    public function __construct($firstname, $lastname)
    {
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
    }

    public function setFirstName($firstname) {
        $this->_firstname = $firstname;
    }
    public function getFirstname() {
        return $this->_firstname;
    }

    public function setLastname($lastname) {
        $this->_lastname = $lastname;
    }

    public function getLastname() {
        return $this->_lastname;
    }
}
