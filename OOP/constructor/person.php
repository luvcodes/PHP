<?php
class Person {
    protected $_firstname;
    protected $_lastname;

    public function __construct($firstname, $lastname) {
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
    }

    public function set_firstname($firstname) {
        $this->_firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function set_lastname($lastname)
    {
        $this->_lastname = $lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->_lastname;
    }
}
