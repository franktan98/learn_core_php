<?php
    defined('SAFE_CALL') OR define('SAFE_CALL',true);
    include_once '../library/Simple_Text.php' ;

    use SimpleLibrary\Simple_Text ;
    
    const NEWLINE = "\r\n";

    $text_reader = new Simple_Text();
    echo '<pre>';
    echo print_r($text_reader->read_text_file('', 'sample.ini')); 
    echo '</pre>';
    echo '<pre>';
    echo print_r($text_reader->read_speacial_text('', 'date.php',true)); 
    echo '</pre>';
    $content = '1st line.' . "\r\n" ; 
    $content = $content .'2nd line.' . "\r\n" ; 
    $content = $content .'3rd line.' . "\r\n" ; 
    $text_reader->write_file('', 'sample.txt',$content,false);

