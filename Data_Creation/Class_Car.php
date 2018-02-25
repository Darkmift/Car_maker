<?php

include('Class_db.php');

class Car {

    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        if ($this->valid_Color()) {
            $this->color = $color;
        }
    }

    function valid_Color() {
        if (!preg_grep("/#([a-f0-9]{6}){1,2}\b/i", explode("\n", $this->color))) {
            return true;
        } else {
            //return false;
            throw new Exception('Invalid Hex value,please try again');
        }
    }

    function save_Car() {
        if ($this->valid_Color()) {
            $db = new Database();
            $db->db_insert($this->name, $this->color);
        }
    }

}
