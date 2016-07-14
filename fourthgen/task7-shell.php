#!/usr/bin/php
<?php
include "serconf.php"; 

$loopcnt = 150;
$file = fopen("templog.txt", "a");
while($loopcnt > 0){
//global $count;
sleep(10);
$temp = gettemp();
$data = $temp . ",". date("H:i:s") . "\n";
fwrite($file, $data);

$loopcnt--;
}
fclose($file);

//echo "<div style='color:white;text-align:center;'>" . "log finished" . "</div>";

//log temerature data
function gettemp(){
global $serial;
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("4");
//usleep(200000);
$read = $serial->readPort();
$serial->deviceClose();
}
$read2= trim($read);
return $read2;

}
?>