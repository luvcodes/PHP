<?php
class Person {
    protected $_firstname;
    protected $_lastname;

    public function set_firstname($firstname) {
        $this->_firstname = $firstname;
    }
    public function set_lastname($lastname) {
        $this->_lastname = $lastname;
    }
    public function get_firstname() {
        return $this->_firstname;
    }

    /**
     * @return mixed
     */
    public function get_lastname()
    {
        return $this->_lastname;
    }
}
