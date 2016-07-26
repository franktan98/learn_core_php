<?php
    defined('SAFE_CALL') OR define('SAFE_CALL',true);
    include_once '../library/Simple_Text.php' ;

    use SimpleLibrary\Simple_Text ;
    
    $text_reader = new Simple_Text();
    echo '<pre>';
    echo print_r($text_reader->read_text_file('', 'sample.ini')); 
    echo '</pre>';
    echo '<pre>';
    echo print_r($text_reader->read_speacial_text('', 'samplsae.ini',true)); 
    echo '</pre>';
?>

