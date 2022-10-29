<?php
include ('animal.php');
class cat extends animal {
    protected $_species;

    public function __construct($animal_name, $species)
    {
        $this->_species = $species;
        $this->set_name($animal_name);
        parent::__construct($animal_name);
    }

    public function set_species($species) {
        $this->_species = $species;
    }

    public function get_species() {
        return $this->_species;
    }

    public function set_name($new_name)
    {
        $this->_name = strtoupper($new_name);
    }
}
