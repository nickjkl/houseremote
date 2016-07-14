<?php 
$PID = exec("ps -eo pid,command | grep 'task7-shell.php' | grep -v grep | awk '{print $1}'");
if($PID < 1){
echo "<div style='color:white;text-align:center;'>" . "Temp log not running" . "</div>";
}
else{
echo "<div style='color:white;text-align:center;'>" . "Stopping Temp Log" . "</div>";
$kill = "kill " . $PID;
exec($kill);

}
?>