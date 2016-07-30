<?php

/*
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$city = "Amersfoort";
if ($stmt = $mysqli->prepare("SELECT District FROM City WHERE Name=?")) {
    $stmt->bind_param("s", $city);
    $stmt->execute();
    $stmt->bind_result($district);
    $stmt->fetch();
    printf("%s is in district %s\n", $city, $district);
    $stmt->close();
}
$mysqli->close();
 */
/*
$mysqli = new mysqli("localhost", "my_user", "my_password", "world");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$mysqli->query("CREATE TABLE myCity LIKE City");

$query = "INSERT INTO myCity (Name, CountryCode, District) VALUES (?,?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("sss", $val1, $val2, $val3);

$val1 = 'Bordeaux';
$val2 = 'FRA';
$val3 = 'Aquitaine';
$stmt->execute();

$stmt->close();
  
$query = "SELECT Name, CountryCode, District FROM myCity";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_row()) {
        printf("%s (%s,%s)\n", $row[0], $row[1], $row[2]);
    }
    $result->close();
}
$mysqli->query("DROP TABLE myCity");
$mysqli->close();
?>
 */
/*
$stmt = $mysqli->prepare("INSERT INTO messages (message) VALUES (?)");
$null = NULL;
$stmt->bind_param("b", $null);
$fp = fopen("messages.txt", "r");
while (!feof($fp)) {
    $stmt->send_long_data(0, fread($fp, 8192));
}
fclose($fp);
$stmt->execute(); */
/*

    mysqli_stmt_execute() - Executes a prepared Query
    mysqli_stmt_fetch() - Fetch results from a prepared statement into the bound variables
    mysqli_stmt_bind_param() - Binds variables to a prepared statement as parameters
    mysqli_stmt_bind_result() - Binds variables to a prepared statement for result storage
    mysqli_stmt_close() - Closes a prepared statement
    mysqli_stmt_errno() - Returns the error code for the most recent statement call
    mysqli_stmt_error() - Returns a string description for last statement error
    mysqli_stmt_sqlstate() - Returns SQLSTATE error from previous statement operation
Type specification chars Character 	Description
i 	corresponding variable has type integer
d 	corresponding variable has type double
s 	corresponding variable has type string
b 	corresponding variable is a blob and will be sent in packets
 */ 
 ?>