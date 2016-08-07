<?php
// this sample is compy from 
// https://www.sitepoint.com/php-data-structures-1/
// SplStack extends SplDoublyLinkedList implements Iterator , ArrayAccess , Countable
// setIteratorMode()

//splStack can use as stack and also queue
class LoginTimer extends SplStack {
    private $stack;
    private $limit;

    public function __construct($limit = 5) {
        // initialize the stack
        $this->stack = array();
        // stack can only contain this many items
        $this->limit = $limit;
    }

    public function push($item) {
        $this->limit > count($this->stack)? $this->limit++ : null ; 
        // trap for stack overflow
        if (count($this->stack) < $this->limit) {
            // prepend item to the start of the array
            array_unshift($this->stack, $item);
        } else {
            throw new RunTimeException('Stack is full!');
        }
        echo var_dump($item) ; 
        echo var_dump($this->stack) ; 
    }

    public function pop() {
        if ($this->isEmpty()) {
            // trap for stack underflow
            throw new RunTimeException('Stack is empty!');
        } else {
            // pop item from the start of the array
            return array_shift($this->stack);
        }
        echo var_dump($this->stack) ; 
    }

    public function top() {
        echo var_dump($this->stack) ; 
        return current($this->stack);
    }

    public function isEmpty() {
        return empty($this->stack);
    }

}

$myTimer = new LoginTimer();

for( $i=0 ; $i< 8 ; $i++ ){
    $myTimer->push(date("Y-m-d H:i:s"));
    echo "<br />";
    sleep(1);
}
    $myTimer->pop();
    echo "<br />";
    $myTimer->pop();
    echo "<br />";
    $myTimer->push(date("Y-m-d H:i:s"));
    echo "<br />";
?>