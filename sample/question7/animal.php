<?php class animal {
    protected $_name;

    function __construct($animal_name) {
        $this->_name = $animal_name;
    }
    public function set_name($new_name)
    {
        $this->_name = $new_name;
    }
    public function get_name()
    {

        return $this->_name;
    }
}
?>
