<?php
require_once('student.php');
class enrolment extends Student {
    protected $_instrument;
    protected $_level;

    public function set_instrument($instrument) {
        $this->_instrument = $instrument;
    }

    public function get_instrument() {
        return $this->_instrument;
    }

    public function set_level($level) {
        $valid_level = [
            "basic", "intermediate", "advanced"
        ];


        $this->_level = $level;
    }

    public function get_level() {
        return $this->_level;
    }

    public function __construct($firstname, $surname, $homeaddress, $parentmobile, $parentemail, $DOB, $subscribe, $instrument, $level)
    {
        $this->_instrument = $instrument;
        $this->_level = $level;

        parent::__construct($firstname, $surname, $homeaddress, $parentmobile, $parentemail, $DOB, $subscribe);
    }
}
