<?php
$filefilename = fopen("filename.txt" , "r");
$fname = fgets($filefilename);
fclose($filefilename);
echo "<div style='color:white;text-align:center;'>" . "<a href=$fname>click here for the log</a>" . "</div>";


?>