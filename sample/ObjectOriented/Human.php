<?php
namespace OO_Sample ; 
// Basic Object Oriented programming Encapsulation
//a simple class to show how Encapsulation of object oriented programming with php

class Human {

    private $name;
    private $date_of_birth;
    private $gendar;

    public function __construct($source_name, $source_date_of_birth, $source_gender) {
        $this->name = $source_name;
        $this->date_of_birth = $source_date_of_birth;
        $this->gendar = $source_gender;
    }

    public function __get($source_property) {
        $method = "get_$source_property";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }

    public function get_name() {
        return $this->name;
    }

    public function get_date_of_birth() {
        return $this->date_of_birth;
    }

    public function get_gendar() {
        return $this->gendar;
    }

}