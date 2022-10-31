<?php
class person {
    protected $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }


    public function set_name($name) {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }
}
