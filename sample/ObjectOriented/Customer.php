<?php
abstract class Customer{
    abstract public function service();
    abstract public function notice();
    
    public function make_transaction(){
        echo 'transaction made';
        echo 'preparing related document....';
    }
    
    public function cancel_transaction(){
        echo ' check transaction status.';
        echo  ' cancel pointed uncomplite transaction';
    }
    
    public function good_delivery(){
        echo 'with delivery invoice';
    }
    
}