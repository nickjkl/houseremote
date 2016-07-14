<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
<title>Cpannel</title></head>
<body>
<div class="navbarcontainer">
<div class="navbar"><a href="index.html">Control</a> | <a href="sensors.html">Sensors</a> | <a 
href="alert.html">Alerts</a> </div></div>
<br />
<div class="title">Sensors</div>
<div class="panelcontainer">
<div id="panel">
<div>
<form  method="post" action="sampleform.php" target="stat" >
<input type="number" name="interval" min="5" max="240" />
<input type="number" name="samples" min="1" max="2000" />
<input type="text" name="filename" />
<input type ="submit" name="submit" value="Start Log" class="button" />
</form>
</div>
</div>
<div>

<div class="center">Status</div>
<div class="output">
<iframe class="status" src="" name="stat"></iframe>
</div>
<?php
if(isset($_POST['submit']))
{
//condx vars
$condx1=false;
$condx2=false;
$condx3=false;

$samples = $_POST['samples'];
$interval = $_POST['interval'];
$rawfilename = $_POST['filename'];
//sanatizing the input
if (!filter_var($samples, FILTER_VALIDATE_INT) === false){
if (0 < $samples and $samples < 2001){
$condx1=true;
echo "<div style='color:white;text-align:center;'>" . "it works" . "</div>";
}
else{
echo "<div style='color:white;text-align:center;'>" . "samples out of range" . "</div>";
}
}

else {

echo "<div style='color:white;text-align:center;' >" . "samples is not valid" . "</div>";
}


}

?>

</body>
</html>