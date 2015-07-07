<html>
<head><title></title></head>
<body>
<form action='' method='post'>
<input type='submit' name='button1' value='Turn on' />
<input type='submit' name='button2' value='Turn off' />
<input type='submit' name="button3" value='create file' />
<input type='submit' name="button4" value='Clear' />
</form> 
<form action='' method='post'>
<input type='submit' name='button5' value='Ob1 on' />
<input type='submit' name='button6' value='Ob1 off' />
<input type='submit' name="button7" value='Ob2 on' />
<input type='submit' name="button8" value='Ob2 off' />
</form> 
<br />Status:<br />
<?php 
date_default_timezone_set("UTC");
if (isset($_POST['button1']))
{
echo "button1 has been pressed";
}
if (isset($_POST['button2']))
{
echo "button2 has been pressed";
}
if (isset($_POST['button3']))
{
shell_exec('./test.sh');
}
if (isset($_POST['button4']))
{
echo "";
}


if (isset($_POST['button5']))
{
shell_exec('scripts/./pref1on.sh');
echo "Ob1 on ";
echo date("h:i:sa");
}
if (isset($_POST['button6']))
{
shell_exec('scripts/./pref1off.sh');
echo "Ob1 off ";
echo date("h:i:sa");
}
if (isset($_POST['button7']))
{

$fp = fopen("/dev/ttyACM0", "r+");
sleep(3);
fwrite($fp,"5");
$data = fread($fp, 4);
fclose($fp);
echo $data;
//shell_exec('scripts/./pref2on.sh');
//echo "Ob2 on";
}
if (isset($_POST['button8']))
{
shell_exec('scripts/./pref2off.sh');
echo "Ob2 off";
}
?>
</body>

</html>
