<?php
require_once 'Human.php';
require_once 'Staff.php';

use OO_Sample\Human;
use OO_Sample\Staff;

    echo '<h1>';
    echo 'Basic Object Oriented Programming : Encapsulation ';
    echo '</h1>';
    $myself = new Human('Fr Tan','2016/04/13','M');
    echo '<br /> ';
    echo 'my name is : ' . $myself->__get('name');
    echo '<br /> ';
    echo 'my d o b is : ' . $myself->get_date_of_birth() ;
    echo '<br /> ';
    echo 'my gender is : ' . $myself->__get('gender') ;
    echo '<br /> ';
    echo '<h1>';
    echo 'Basic Object Oriented Programming : Inheritance ';
    echo '</h1>';
    $new_staff = new Staff('Fr Tan','2016/04/13','M',1,'normal staff');
    echo '<br /> ';
    echo 'new staff name is : ' . $new_staff->__get('name');
    echo '<br /> ';
    echo 'new staff d o b is : ' . $new_staff->get_date_of_birth() ;
    echo '<br /> ';
    echo 'new staff gender is : ' . $new_staff->__get('gender') ;
    echo '<br /> ';
    echo 'new staff id is '. $new_staff->get_staff_id();
    echo '<br /> ';
    echo 'new staff position is '. $new_staff->__get('staff_position');
    echo '<h1>';
    echo '</h1>';
