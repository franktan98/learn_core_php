<?php
    const NEWLINE = "\r\n";

    $begin_of_the_loop = 0 ;
    $total_loop = 15 ;

//======================================================
    echo '<br />for Loop<br />';
    for($counter_for_loop = $begin_of_the_loop ;
        $counter_for_loop < $total_loop ;
        $counter_for_loop++ ){
            echo $counter_for_loop ; 
    }
//======================================================
    echo '<br />while Loop<br />';
    $counter_for_while = 0 ;
    while($counter_for_while < $total_loop){
        echo $counter_for_while ; 
        $counter_for_while++;
    }
//======================================================
    echo '<br />do while Loop<br />';
    $counter_do_loop = 0 ;
    do{
        echo $counter_do_loop ; 
        $counter_do_loop++;
    }while($counter_do_loop > $total_loop);
//======================================================
    echo '<br />do while Loop<br />';
    $counter_do_loop = 0 ;
    do{
        echo $counter_do_loop ; 
        $counter_do_loop++;
    }while($counter_do_loop < $total_loop);
    echo '<br />';
//======================================================
//if then else            

//======================================================
// switch
    
    