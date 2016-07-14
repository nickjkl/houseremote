<?php
include "serconf.php"; 
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("6");
//usleep(200000);
$read = $serial->readPort();
$serial->deviceClose();

}
echo "<div style='color:white;text-align:center;'>" . $read . "</div>";
echo "<div style='color:white;text-align:center;'>" . date("h:i:sa") . "</div>";


?>