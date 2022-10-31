<?php
require_once ("person.php");

class employee extends person {
    protected $_age;

    public function __construct($name, $age) {
        $this->_age = $age;
        parent::__construct($name);
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->_age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

}
