<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
<title>Cpannel</title></head>
<body>
<div id="title">Control Panel</div>
<div id="panel">
<form  method='post'>
<input type='submit' name='button1' value='Read Photo' id="buttona" class="button"/>
<input type='submit' name='button2' value='Turn off' id="buttonb" class="button"/>
<input type='submit' name="button3" value='Read Temp' id="buttonc" class="button"/>
<input type='submit' name="button4" value='Clear' id="buttond" class="button"/>
</form> 
<form  method='post'>
<input type='submit' name='button5' value='Ob1 on' id="buttone" class="button"/>
<input type='submit' name='button6' value='Ob1 off' id="buttonf" class="button"/>
<input type='submit' name="button7" value='Ob2 on' id="buttong" class="button"/>
<input type='submit' name="button8" value='Ob2 off' id="buttonh" class="button"/>
</form>
<form  method='post' action="data.php" target="stat">
<input type='submit' name="button9" value='disp' id="buttoni" class="button"/>
</form> 
</div>
<div class="status">
<br />Status:<br />
<iframe id="stat" src="" name="stat"></iframe>
</div>

<?php
//phpinfo();
include "php_serial.class.php"; 
$serial = new phpSerial;
$serial->deviceSet("/dev/ttyUSB0");
$serial->confBaudRate(115200);
$serial->confParity("none");
$serial->confCharacterLength(8);
$serial->confStopBits(1);
//$serial->deviceOpen();
date_default_timezone_set("UTC");
if (isset($_POST['button1']))
{
//$serial->deviceOpen();
//$serial->sendMessage("9");
//usleep(200000);
//$read = $serial->readPort();
//$serial->deviceClose();
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("9");
//usleep(200000);
$read = $serial->readPort();
$serial->deviceClose();

}
echo "<div class='status'>" . $read . "</div>";
echo "<div class='status'>" . date("h:i:sa") . "</div>";
}

if (isset($_POST['button2']))
{
echo "button2 has been pressed";
}
if (isset($_POST['button3']))
{

while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("4");
//usleep(200000);
$read = $serial->readPort();
$serial->deviceClose();

}
echo "<div class='status'>" . $read . "</div>";
echo "<div class='status'>" . date("h:i:sa") . "</div>";

}
if (isset($_POST['button4']))
{
echo "";
}


if (isset($_POST['button5']))
{
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("5");
$read = $serial->readPort();
$serial->deviceClose();
}
echo "<div class='status'>" . $read . "</div>";
//$serial->deviceClose();
echo "<div class='status'>" . date("h:i:sa") . "</div>";
}
if (isset($_POST['button6']))
{
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("6");
$read = $serial->readPort();
$serial->deviceClose();
}
echo "<div class='status'>" . $read . "</div>";
//$serial->deviceClose();
echo "<div class='status'>" . date("h:i:sa") . "</div>";
}
if (isset($_POST['button7']))
{
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("7");
$read = $serial->readPort();
$serial->deviceClose();
}
echo "<div class='status'>" . $read . "</div>";
//$serial->deviceClose();
echo "<div class='status'>" . date("h:i:sa") . "</div>";
}
if (isset($_POST['button8']))
{
while( empty($read)){
$serial->deviceOpen();
$serial->sendMessage("8");
$read = $serial->readPort();
$serial->deviceClose();
}
echo "<div class='status'>" . $read . "</div>";
//$serial->deviceClose();
echo "<div class='status'>" . date("h:i:sa") . "</div>";
}
if (isset($_POST['button9']))
{
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => '/data.php',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'item1' =>'value','item2' =>'value2'
    )
));
$result=curl_exec($curl);
curl_close($curl);
}
?>
</body>

</html>
