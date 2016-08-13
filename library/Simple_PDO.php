<?php
namespace SimpleLibrary;

defined('SAFE_CALL') OR exit('No direct script access allowed');

require_once 'Simple_Log.php';

use SimpleLibrary\Simple_Log;
use \PDO;

class Simple_PDO {
    private $database_host;
    private $database_name;
    private $database_user;
    private $database_password;
    private $database_system_name;
    private $error_message;
    private $sql_string;
    private $database_handler;
    private $log_handler;

    /**
     * preset all variable to empty
     */
    private function init_class() {
        $this->log_handler = new Simple_Log();
        $this->log_handler->set_log_environment(
                DEFAULT_DEBUG_LEVEL, LOG_DIR, LOG_NAME, array());
        $this->database_host = '';
        $this->database_name = '';
        $this->database_user = '';
        $this->database_password = '';
        $this->database_system_name = 'mysql'; //  currently prefix it to mysql 
        $this->error_message = ''; //  when begin of code is no error 
        $this->database_handler = null;
        $this->sql_string = '';
        $this->log_handler->log_me('debug', 'Simple PDO call: ' . date("Y-m-d H:i:s"));
    }

    /**
     * set all variable to given variable
     * 
     * @param string $source_host where the host of the database
     * @param string $source_database_name database name 
     * @param string $source_user database access user name
     * @param string $source_password database access password
     */
    public function __construct($source_host, $source_database_name, $source_user, $source_password) {
        $this->init_class();
        $this->database_host = $source_host;
        $this->database_name = $source_database_name;
        $this->database_user = $source_user;
        $this->database_password = $source_password;
    }

    public function index() {
    }

    /**
     * error message will always empty only available when error on connection or execute 
     * 
     * @return string error message 
     */
    public function get_error_message() {
        return $this->error_message;
    }

    public function get_sql() {
        return $this->sql_string;
    }

    public function set_sql($source_sql) {
        $this->sql_string = $source_sql;
    }

    /**
     * connect to database
     * @return boolean return true when connection is valid, else just return false
     */
    public function preparing_connection() {
        $connection_string = "$this->database_system_name:host=$this->database_host;dbname=$this->database_name";
        $this->log_handler->log_me('debug', 'database connection preparing : ' . date("Y-m-d H:i:s"));
        $this->log_handler->log_me('debug', 'connection string :' . $connection_string);
        $this->log_handler->log_me('debug', 'user :' . $this->database_user);
        try {
            // set the PDO error mode to exception
            //$this->database_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->database_handler = new PDO($connection_string, $this->database_user, $this->database_password);
            $return_value = true;
        } catch (PDOException $ex) {
            $this->error_message = $ex->getMessage();
            $return_value = false;
            $this->log_handler->log_me('emergency', 'connection string :' . $connection_string);
            $this->log_handler->log_me('emergency', 'user :' . $this->database_user);
            $this->log_handler->log_me('emergency', 'Connection Fail' . $ex->getMessage());
        }
        return $return_value;
    }

    /**
     * close connection 
     */
    public function closing_connection() {
        $this->database_handler = null;
    }

    /**
     * execute select sql command seting and return the result
     * 
     * @return array a list of records 
     */
    public function execute_query($parameter ) {
        $return_result = null;
        $this->log_handler->log_me('debug', 'preparing to execute query : ' . date("Y-m-d H:i:s"));
        $this->log_handler->log_me('debug', 'execute query ' . $this->sql_string);
        try {
            $this->database_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $this->database_handler->prepare($this->sql_string);
            $statement->execute($parameter);
            
            $return_result = $statement->fetchAll(PDO::FETCH_CLASS);
        } catch (PDOException $ex) {
            $this->error_message = $ex->getMessage();
            $return_result = null;
            $this->log_handler->log_me('error', 'execute query at : ' . date("Y-m-d H:i:s"));
            $this->log_handler->log_me('error', 'execute query ' . $this->sql_string);
            $this->log_handler->log_me('error', 'Query execution fail' . $ex->getMessage());
        }
        return $return_result;
    }

    public function execute() {
        $return_result = 0;
        $this->log_handler->log_me('debug', 'preparing to execute sql command : ' . date("Y-m-d H:i:s"));
        $this->log_handler->log_me('debug', 'execute sql command ' . $this->sql_string);
        try {
            // set the PDO error mode to exception
            $this->database_handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $this->database_handler->prepare($this->sql_string);
            $statement->execute();
            
            $return_result = $statement->rowCount();
        } catch (PDOException $ex) {
            $this->error_message = $ex->getMessage();
            $return_result = 0;
            $this->log_handler->log_me('error', 'execute sql command at : ' . date("Y-m-d H:i:s"));
            $this->log_handler->log_me('error', 'execute sql command ' . $this->sql_string);
            $this->log_handler->log_me('error', 'Query execution fail' . $ex->getMessage());
        }
        return $return_result;
        }

}