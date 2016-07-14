<?php
//$filefilename = fopen("filename.txt" , "r");
//$fname = fgets($filefilename);
//fclose($filefilename);
foreach (glob("../templogfiles/*.csv") as $fname){
$text="../templogfiles/";
$filetrimmed = trim($fname, $text);
echo "<div style='color:white;text-align:center;'>" . "<a href=$fname style='color:white;text-decoration:none;'>click here for log $filetrimmed</a>" . "</div>";
}

?>