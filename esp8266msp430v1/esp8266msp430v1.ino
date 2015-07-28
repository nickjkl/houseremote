/*
This is the code for the msp430g2553(using Energia) 
that sends an alert to my webserver when a waterleak is detected
(when pin 1.4 goes low when water touches wires that are connected to
pin 1.4 and ground) via the ESP8266 chip


important note: you will need to change the ip to the address of your
server

the code also toggles pin 1.0, that bit of code was from me testing things

*/



boolean fl =0;

void setup()
{
  // pin config for interrupt
   P1OUT &=~BIT0;
   P1OUT |=BIT4;
   P1DIR |= BIT0; // Set P1.0 to output direction
   P1REN|=BIT4;//enable pullup resistor
   P1IES |= BIT4; // P1.4 Hi/lo edge page 331
   P1IFG &= ~BIT4; // P1.4 IFG cleared
   P1IE |= BIT4; // P1.4 interrupt enabled must be after the interrupt config
    __enable_interrupt();  // Enable Global Interrupts needed for it to work
delay(6000);
Serial.begin(115200);
}

void loop()
{
  // put your main code here, to run repeatedly:
 if(fl==1){
 sendalert();
 fl=0;
 }
}
// Port 1 interrupt service routine
#pragma vector=PORT1_VECTOR
__interrupt void Port_1 (void)
{
P1OUT ^= 0x01; // P1.0 = toggle
fl=1;
P1IFG &= ~BIT4; // P1.3 IFG cleared
}


void sendalert(){
Serial.print("AT+CIPSTART=\"TCP\",\"192.168.18.103\",80\r\n");
delay(50);
Serial.print("AT+CIPSEND=");
Serial.print(66);
Serial.print("\r\n");
delay(50);
Serial.print("GET /sensor.php?data=");//21
Serial.print("waterleak"); //9
Serial.print(" HTTP/1.1\r\n");//13
Serial.print("Host: test.domain.com\r\n\r\n");//23
}  


