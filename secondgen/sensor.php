<?php
if($_GET){
date_default_timezone_set("UTC");
$data = $_GET['data'];
$datfile = fopen("error.txt", "a");
fwrite($datfile, $data . " " . date("h:i:sa") ."\n");

fclose($datfile);

}
//curl -X POST -d "data=500" http://localhost/rec.php
//curl -X POST -d "data=500&press=what" http://localhost/rec.php
//curl -X POST -d "data=300&text=%20who%20ar%20you" http://localhost/rec.php

?>
