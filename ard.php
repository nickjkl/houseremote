<?php
include "php_serial.class.php";

echo "<html>
      <head><title>Test MySQL</title></head>
      <body>";


// Let's start the class
$serial = new phpSerial;

// First we must specify the device. This works on both linux and windows (if
// your linux serial device is /dev/ttyS0 for COM1, etc)
$serial->deviceSet("/dev/ttyACM0");

$serial->confBaudRate(9600);
sleep(1);
// Then we need to open it
$serial->deviceOpen();
//sleep(1);
// To write into
$serial->sendMessage("5");

// Or to read from
$read = $serial->readPort();

echo "here it is";
echo $read;
echo "here it was";


//sleep(1);

// If you want to change the configuration, the device must be closed
$serial->deviceClose();
?>
