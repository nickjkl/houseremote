<?php 
$PID = exec("ps -eo pid,command | grep 'log-shell.php' | grep -v grep | awk '{print $1}'");
if($PID < 1){
echo "<div style='color:white;text-align:center;'>" . "Temp log not running" . "</div>";
}
else{
echo "<div style='color:white;text-align:center;'>" . "Temp log is running" . "</div>";

}
?>