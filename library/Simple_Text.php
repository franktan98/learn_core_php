<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SimpleLibrary;
defined('SAFE_CALL') OR exit('No direct script access allowed');

/**
 * Description of Simple_Text
 *
 * @author frank
 */
class Simple_Text {
    
    private $file_name;
    private $store_directory;
    
    /**
     * initiliaze of the class
     * set to default setting ready to use mode
     */
    private function init_class(){
        $this->file_name = 'default.txt';
        $this->store_directory = '';
    }
    
    public function __construct() {
        $this->init_class();
    }
    
    public function read_speacial_text($source_directory = '' , $source_file_name = 'default.txt', $source_issource = false ){
        $return_value = '' ; 
        $file_read = $source_directory .''.$source_file_name ;
        try{
            if ($source_issource){
                $return_value = show_source($file_read) ;
            }else{
                // if the text is in <> then thiswill skip to reading those text inside the <> block
                $return_value = file_get_contents($file_read);
            }
        } catch (Exception $ex) {
            $return_value = 'file not found or reading permission deny.';
        }
        return $return_value ; 
    }
    
    public function read_text_file($source_directory = '' , $source_file_name = 'default.txt'){
        $return_value = '' ; 
        $file_read = $source_directory .''.$source_file_name ;
        try{
            $myfile = fopen($file_read,'r') or die($return_value = $file_read. ' file not found or reading permission deny.');
            while(! feof($myfile))
            {
                $return_value[] = fgets($myfile) ;
            }
            fclose($myfile);
        } catch (Exception $ex) {
            $return_value = 'file not found or reading permission deny.';
        }
        return $return_value ; 
    }
    
    public function write_file(){
        
    }
    
    public function append_file(){
        
    }
}

/*
    try
    {
      $fileName = 'uploads/Team/img/'.$team_id.'.png';

      if ( !file_exists($fileName) ) {
        throw new Exception('File not found.');
      }

      $fp = fopen($fileName, "rb");
      if ( !$fp ) {
        throw new Exception('File open failed.');
      }  
      $str = stream_get_contents($fp);
      fclose($fp);

      // send success JSON

    } catch ( Exception $e ) {
      // send error message if you can
    } 
 */