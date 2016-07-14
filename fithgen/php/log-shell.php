#!/usr/bin/php
<?php
include "serconf.php"; 

$fileinterval = fopen("../templogfiles/interval.txt", "r");
$interval = fgets($fileinterval);
fclose($fileinterval);

$filesamples = fopen("../templogfiles/samples.txt", "r");
$loopcnt = fgets($filesamples);
fclose($filesamples);

$filefilename = fopen("../templogfiles/filename.txt" , "r");
$fname = "../templogfiles/" . fgets($filefilename);
fclose($filefilename);


$file = fopen($fname, "w");
while($loopcnt > 0){
//global $count;
sleep($interval);
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