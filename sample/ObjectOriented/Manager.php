<?php
// Basic Object Oriented programming Inheritance
//a simple class to show how Inheritance of object oriented programming with php
namespace OO_Sample ; 
//use OO_Sample\Human;
require_once 'iNormalStaffTask.php';
require_once 'iManagerTask.php';

class Manager extends Human implements iManagerTask, iNormalStaffTask{
//class Staff extends Human {
    protected $id_sg;
    protected $position_sg;
    private $project ;
    
    public function __construct($source_name,$source_date_of_birth,
            $source_gender,  $source_id, $source_position) {
        parent::__construct($source_name,$source_date_of_birth,$source_gender);
        $this->id_sg = $source_id;
        $this->position_sg = $source_position;
    }
    
    public function compeling_report(){}
    public function scheduling_task(){
        echo 'scheduling task';
    }
    public function approvel_request(){}
    public function reject_request(){}
    
    public function generate_task_report(){
        echo 'Generate report related!!!';
        echo var_dump($this->task);
    }

    public function execute_task($source_task_name){
        echo 'execute task with title '. $source_task_name;
        $this->task[] = $source_task_name ; 
    }

    /**
     * lazy get for php
     * version support (PHP 5 >= 5.1.0, PHP 7) aupport property_exists function
     * by using postfix _s,_g or _sg to define set or get function to the property define.
     * simple, easy, lazy and clear for lazy programmer.
     * 
     * @param string $source_property
     * @return any_datatype any data type may return by the property may be array ,object or a string
     */
    public function __get($source_property) {
        $property_name_sg = $source_property . '_sg';
        $property_name_g = $source_property . '_g';
        if (property_exists($this, $property_name_sg)) {
            return $this->$property_name_sg;
        }
        if (property_exists($this, $property_name_g)) {
            return $this->$property_name_g;
        }
    }

    /**
     * lazy set for php
     * version support (PHP 5 >= 5.1.0, PHP 7) aupport property_exists function
     * by using postfix _s,_g or _sg to define set or get function to the property define.
     * simple, easy, lazy and clear for lazy programmer.
     * 
     * @param string $source_property the name of the property
     * @param any_datatype $source_value this may i=b an object,array or any datatype
     */
    public function __set($source_property,$source_value) {
        $property_name_sg = $source_property . '_sg';
        $property_name_s = $source_property . '_s';
        if (property_exists($this, $property_name_sg)) {
            $this->$property_name_sg = $source_value;
        }
        if (property_exists($this, $property_name_s)) {
            $this->$property_name_s = $source_value;
        }
    }
}