<?php
function create_database($source_servername , $source_username , $source_password , $source_database_name){
    $return_value = '';
    // Create database SQL
    $sql = "CREATE DATABASE $source_database_name";

    $server_conn = new mysqli($source_servername, $source_username, $source_password);
    if ($server_conn->connect_error) {
        die($error_message = "Connection failed: " . $server_conn->connect_error);
    } 

    // connection fail try create database
    if ($server_conn->query($sql) === TRUE) {
        $return_value = "Database created successfully";
    } else {
        $return_value = "Error creating database: " . $server_conn->error;
    }
    
    $server_conn->close();
    return $return_value ;
}

function check_table_exits($source_connection,$source_table_name){
    $return_value = false;
    $sql = "SHOW TABLES LIKE '$source_table_name';";
    $query_result = $source_connection->query($sql);
    echo var_dump($query_result) ; 
    if ($query_result->num_rows === 1 ){
        $return_value = true ; 
    }
    return $return_value;
}

function create_table($source_connection, $source_table_name,$source_table_columns){
    $return_value  = '' ; 
    // sql to create table
    $sql = 'CREATE TABLE '.$source_table_name . '('.$source_table_columns.')';
    echo $sql ; 
    if ($source_connection->query($sql) === TRUE) {
        $return_value =  "Table $source_table_name created successfully";
    } else {
        $return_value =  "Error creating table: " . $source_connection->error;
    }
    return $return_value ; 
}

function insert_into_table($source_connection, $source_table , $source_record ){
    $return_value = '' ;
    $sql = "INSERT INTO $source_table (firstname, lastname)
    VALUES ($source_record)";

    if ($source_connection->query($sql) === TRUE) {
        $return_value= "New record created successfully";
    } else {
        $return_value= "Error: " . $sql . "<br>" . $source_connection->error;
    }    
    return $return_value;
}

function update_records($source_connection, $source_table , $source_match_recrod, $source_record ){
    $return_value = '' ;
    $sql = "UPDATE $source_table SET $source_record WHERE $source_match_recrod ";
    if ($source_connection->query($sql) === TRUE) {
        $return_value= "Record updated successfully";
    } else {
        $return_value= "Error: " . $sql . "<br>" . $source_connection->error;
    }    
    return $return_value;
}

function extract_table($source_connection, $source_select_item , $source_table){
    $return_value = null;
    $sql = "SELECT $source_select_item FROM $source_table";
    $return_value = $source_connection->query($sql);
    
    return $return_value ; 
}

//VAR
$servername = "localhost";
$username = "aaaa";
$password = "aaaa";
$error_message = '' ;
$database_name = 'sample';
$table_name = 'guests';
$table_column = 'id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,'.  
    'firstname VARCHAR(30) NOT NULL,'.
    'lastname VARCHAR(30) NOT NULL,'.  
    'reg_date TIMESTAMP';
$message = '' ; 
$select_item = 'id, firstname, lastname';
// CODE BEGIN
//mysqli("localhost", "username", "password", "", port) // if not use default port 
$conn = new mysqli($servername, $username, $password,$database_name);
if ($conn->connect_error) {
    echo create_database($servername, $username, $password,$database_name); 
    $executable_connection = new mysqli($servername, $username, $password,$database_name);
    $message=create_table($executable_connection,$table_name,$table_column);
}else{
    $executable_connection = new mysqli($servername, $username, $password,$database_name);
    //check_table_exits($executable_connection,$table_name)? null: null ;
    //check_table_exits($executable_connection,$table_name)? create_table($executable_connection,$table_name,$table_column): null ;
    check_table_exits($executable_connection,$table_name)
            ? $message='table exists' 
            : $message=create_table($executable_connection,$table_name,$table_column);
    echo $message ;
    echo '<br />';
    echo 'update progress ...';
    echo '<br />';
    echo 'update 1st record date time as last name...';
    $current_datetime = date('Y-m-d H:i:s');
    $update_data="firstname = 'Tan$current_datetime'";
    $match_update = "id=1";
    echo update_records($executable_connection, $table_name, $match_update , $update_data);
    echo '<br />';
    echo 'insert data 1st name prefix tan with date time, last name as hk...';
    $insert_data = "'Tan$current_datetime','HK'";
    echo insert_into_table($executable_connection, $table_name , $insert_data);

    echo '<br />';
    $records = extract_table($executable_connection, '*' , $table_name);
    if ($records ->num_rows > 0) {
        // output data of each row
        while($row = $records->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " 
                    . $row["lastname"]. "create at ".$row['reg_date']."<br>";
        }
    } else {
        echo "0 results";
    }

}
$executable_connection->close();
$conn->close();


?> 