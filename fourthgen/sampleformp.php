<?php
//condx vars
$condx1=false;
$condx2=false;
$condx3=false;

$samples = $_POST['samples'];
$interval = $_POST['interval'];
$rawfilename = $_POST['filename'];
//sanatizing the input
if (!filter_var($samples, FILTER_VALIDATE_INT) === false){
if (0 < $samples and $samples < 7001){
$condx1=true;
echo "<div style='color:white;text-align:center;'>" . "samples value valid" . "</div>";
}
else{
echo "<div style='color:white;text-align:center;'>" . "samples out of range" . "</div>";
}
}

else {

echo "<div style='color:white;text-align:center;' >" . "samples is not valid" . "</div>";
}
//for interval
if (!filter_var($interval, FILTER_VALIDATE_INT) === false){
if (0 < $interval and $interval < 241){
$condx2=true;
echo "<div style='color:white;text-align:center;'>" . "interval value valid" . "</div>";
}
else{
echo "<div style='color:white;text-align:center;'>" . "interval out of range" . "</div>";
}
}

else {

echo "<div style='color:white;text-align:center;' >" . "interval is not valid" . "</div>";
}
//for filename

$validfilename = filter_var($rawfilename, FILTER_SANITIZE_STRING);
if (empty($validfilename)){
echo "<div style='color:white;text-align:center;' >" . "filename is not valid" . "</div>";
}
else {
$condx3=true;
echo "<div style='color:white;text-align:center;'>" . "filename value valid" . "</div>";
}
//checking if all condx is true
if($condx1 == true and $condx2 == true and $condx3 == true){

//startup procedue
//
//du duh


$running = processExists("log-shell.php");
if($running == true){
echo "<div style='color:white;text-align:center;'>" . "Temp logging already going on" . "</div>";
}
else {
//write to filename file
$filefilename = fopen("filename.txt", "w");
fwrite($filefilename, $validfilename . ".csv");
fclose($filefilename);

//write to interval file
$intervalfilename = fopen("interval.txt", "w");
fwrite($intervalfilename,$interval);
fclose($intervalfilename);
//write to samples file
$samplesfilename = fopen("samples.txt", "w");
fwrite($samplesfilename,$samples);
fclose($samplesfilename);
echo "<div style='color:white;text-align:center;'>" . "Turning on temp logging". "</div>";
shell_exec("/var/www/html/houseremote/nextgen/fourthgen/log-shell.php" . "> /dev/null &");

}





}
else {
echo "<div style='color:white;text-align:center;'>" . "unable to start, errors" . "</div>";
}

function processExists($processName) {
    $exists= false;
    exec("ps -A | grep -i $processName | grep -v grep", $pids);
    if (count($pids) > 0) {
        $exists = true;
    }
    return $exists;
}

?>

