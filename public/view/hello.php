<h1>Hello World in H1</h1>
<p><?php echo 'Hello world in php' ; ?></p>
<?php 
/*
post = insert, delete = delete, put = update , get = select 
 
patch , header , option     

$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = str_replace("&", "?", $request_uri);
$request_args = explode("?", $request_uri);
foreach($request_args as $key => $val) {
    if(strpos($val, "=") > 0) {
        $nvp_temp = explode("=", $val);
        $_GET[$nvp_temp[0]] = $nvp_temp[1];
    }
}
*/
?>
<form action="ReportGenerate.php" method="delete">
Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
Test: <input type="text" name="test"><br>
Add : <input type="text" name="add"><br>
<input type="submit">
</form>