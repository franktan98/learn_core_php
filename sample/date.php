 <?php
    defined('SAFE_CALL') OR exit('No direct script access allowed');

$start_time = microtime(true);
date_default_timezone_set('Asia/Kuala_Lumpur');
// get current date and time
$date_time = new DateTime() ;
$current_date_time = $date_time->getTimestamp();

//echo $date_time ; 
echo "TimeStamp : " . $current_date_time  . "<br />";
echo "Today is (Y-m-d): " . date("Y-m-d" , $current_date_time) . "<br />";
echo "(Y): " . date("Y" , $current_date_time) . "<br />";
echo "(y): " . date("y" , $current_date_time) . "<br />";
echo "(M): " . date("M" , $current_date_time) . "<br />";
echo "(m) with zero: " . date("m" , $current_date_time) . "<br />";
echo "(n): " . date("n" , $current_date_time) . "<br />";
echo "(F): " . date("F" , $current_date_time) . "<br />";
echo "(t): number of day in month : " . date("t" , $current_date_time) . "<br />";
echo "(L) Leap Year : " . date("L" , $current_date_time) . "<br />";

echo "<br />";
echo "Current Time (H:i:s) : " . date("H:i:s" , $current_date_time). "<br />";
echo "(h:i:s a) : " . date("h:i:s a" , $current_date_time). "<br />";
echo "(h) : " . date("h" , $current_date_time). "<br />";
echo "(H) : " . date("H" , $current_date_time). "<br />";
echo "(g) : " . date("g" , $current_date_time). "<br />";
echo "(G) : " . date("G" , $current_date_time). "<br />";
echo "(i) : " . date("i" , $current_date_time). "<br />";
echo "(s) : " . date("s" , $current_date_time). "<br />";
echo "(u) : " . date("u" , $current_date_time). "<br />";
echo "(a) : " . date("a" , $current_date_time). "<br />";
echo "(A) : " . date("A" , $current_date_time). "<br />";
echo "(B) Internatinoal time : " . date("B" , $current_date_time). "<br />";
echo "(e) time zone: " . date("e" , $current_date_time). "<br />";

$d=strtotime("tomorrow");
echo "tomorrow : ". date("Y-m-d h:i:sa", $d) . "<br />";
$startdate = strtotime("Saturday");
$enddate = strtotime("+6 weeks", $startdate);
echo "<br />";
while ($startdate < $enddate) {
  echo date("M d", $startdate) . "<br>";
  $startdate = strtotime("+1 week", $startdate);
}

$d=mktime(11, 14, 54, 20, 4, 2014);
echo "<br />";
echo "Created date is " . date("Y-m-d h:i:sa", $d);

$current_timestamp_string = microtime();
echo "<br />";
echo $current_timestamp_string;

usleep(1000);

$current_timestamp_float = microtime(TRUE);
echo '<br />current micro time'. $current_timestamp_float;
echo '<br />start microtime '. $start_time;
$micro = $current_timestamp_float - $start_time ;

echo '<br />total time for process page is :';
echo $micro;
echo 'second(s).';
?>