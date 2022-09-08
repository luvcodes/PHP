s<?php

class Student {
    protected $_firstname;
    protected $_surname;
    protected $_homeaddress;
    protected $_parentmobile;
    protected $_DOB;
    protected $_parentemail;
    protected $_subscribe;

    // setter and getter for firstname
    public function set_firstname($firstname) {
        $this->_firstname = $firstname;
    }

    public function get_firstname() {
        return $this->_firstname;
    }

    // setter and getter for surname
    public function set_surname($surname) {
        $this->_surname = $surname;
    }

    public function get_surname() {
        return $this->_surname;
    }

    // setter and getter for homeaddress
    public function set_homeaddress($homeaddress) {
        $this->_homeaddress = $homeaddress;
    }

    public function get_homeaddress() {
        return $this->_homeaddress;
    }

    // setter and getter for parentmobile
    public function set_parentmobile($parentmobile){
        $this->_parentmobile = $parentmobile;
    }

    public function get_parentmobile() {
        return $this->_parentmobile;
    }

    // setter and getter for parentemail
    public function set_parentemail($parentemail) {
        $this->_parentemail = $parentemail;
    }

    public function get_parentemail() {
        return $this->_parentemail;
    }

    // setter and getter for DOB
    public function set_DOB($DOB) {
        $this->_DOB = $DOB;
    }

    public function get_DOB() {
        return $this->_DOB;
    }

    // setter and getter for subscribe
    public function set_subscribe($subscribe) {
        $this->_subscribe = $subscribe;
    }

    public function get_subscribe() {
        return $this->_subscribe;
    }

    public function __construct($firstname, $surname, $homeaddress, $parentemail, $parentmobile, $DOB, $subscribe)
    {
        $this->set_firstname($firstname);
        $this->set_surname($surname);
        $this->set_homeaddress($homeaddress);
        $this->set_parentmobile($parentmobile);
        $this->set_parentemail($parentemail);
        $this->set_DOB($DOB);
        $this->set_subscribe($subscribe);
    }

    public function __toString()
    {
        $output = "<p><span class='label'>Student Name </span>" . $this->get_firstname() . $this->get_surname() . "</p>";
        $output .= "<p><span class='label'>Home Address: </span>" . $this->get_homeaddress() . "</p>";
        $output .= "<p><span class='label>Parent Email: </span>" . $this->get_parentemail() . "</p>";
        $output .= "<p><span class='label'>Parent phone mobile: </span>" . $this->get_parentmobile() . "</p>";
        $output .= "<p><span class='label'>DOB: </span>" . $this->get_DOB() . "</p>";
        $output .= "<p><span class='label'>Subscribe: </span>" . $this->get_subscribe() . "</p>";

        return $output;
    }
}
