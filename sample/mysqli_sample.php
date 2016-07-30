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
        $return_value =  "Table MyGuests created successfully";
    } else {
        $return_value =  "Error creating table: " . $source_connection->error;
    }
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
//
$message = '' ; 
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
}
$executable_connection->close();
$conn->close();

/*
// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
*/
?> 