<?php
//shell_exec("/var/www/html/houseremote/nextgen/fourthgen/task7-shell.php" . "> /dev/null &");


$running = processExists("task7-shell.php");
if($running == true){
echo "<div style='color:white;text-align:center;'>" . "Temp logging already going on" . "</div>";
}
else {
echo "<div style='color:white;text-align:center;'>" . "Turning on temp logging". "</div>";
shell_exec("/var/www/html/houseremote/nextgen/fourthgen/task7-shell.php" . "> /dev/null &");

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