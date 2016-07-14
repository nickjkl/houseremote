<?php
$PID = exec("ps -eo pid,command | grep 'log-shell.php' | grep -v grep | awk '{print $1}'");
if($PID < 1){

foreach (glob("../templogfiles/*.csv") as $filename) {
   //echo "$filename size " . filesize($filename) . "\n";
   unlink($filename);
}

echo "<div style='color:white;text-align:center;'>" . "all logs deleted" . "</div>";
}
else{
echo "<div style='color:white;text-align:center;'>" . "cannot delete while log is running" . "</div>";
}
?>