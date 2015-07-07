//temp sensor vars
boolean neg=0;
byte temp=0;
float tempb=0;
// end

byte hybyte=0;
int result=0;

int ser;
void setup() {
  // put your setup code here, to run once:
DDRD|=B11000000; //setting pins 20 and 21 as outputs
ADMUX=B01000111;//set adc reference and select channel
ADCSRA=B10000110;//enable adc and set prescaler to divide by 64
//temp sensor pins
PORTC |=B11000000;
DDRC |=B11000000;// pc7 as ada and pc6 as sck
//end
Serial.begin(115200);
DS1631startconvert();
}

void loop() {
  // put your main code here, to run repeatedly:
//cal = OSCCAL;
if (Serial.available()> 0){
     ser = Serial.read();
     //ser=ser-50;
     if (ser == 52){//keyboard key 4 to read the temp sensor
      DS1631readtemp();
    // delay(25);
      tempb=(tempb*(9.0/5.0))+32;
      Serial.println(tempb,4);//4 decimal places 
      neg=0;
      temp=0;
     tempb=0;
    delay(250);
    while(Serial.available())
  Serial.read();
    ser=0;
       }
     else if (ser == 53){//keyboard key 5 to turn on led1
      PORTD |=B01000000;
      //delay(25);
    Serial.println("Object1 enabled");
  // delay(250); 
       }
     else if(ser == 54){//keyboard key 6 to turn off led1
      PORTD &=~B01000000;
          // delay(25);
      Serial.println("Object1 disabled");
    // delay(25); 
       }
     else if(ser == 55){//keyboard key 7 to turn led2 on
      PORTD |=B10000000;
            //delay(25);
       Serial.println("Object2 enabled");
      //delay(25); 
       }
      else if(ser == 56){//keyboard key 8 to tourn led2 off
      PORTD &=~B10000000;
          //  delay(25);
     Serial.println("Object2 disabled");
     
       }
       else if(ser == 57){//keyboard key 9 to read the photoresistor
           // delay(25);
            adcread();
            //delay(25);
     Serial.println(result);
    delay(250);
    while(Serial.available())
  Serial.read();
     
   //  delay(25);
       }
//delay(100);       
}
ser =0;
}

void adcread(){
ADCSRA |= (1 << ADSC);         // start ADC measurement
    while (ADCSRA & (1<<ADSC)); // wait till conversion complete 
result=ADCW;

}
//temp sensor reading
void start(){
DDRC|=_BV(DDC7);
PORTC|=_BV(DDC7);
PORTC|=_BV(DDC6);
PORTC&=~_BV(DDC7);
PORTC&=~_BV(DDC6);
}

void stop1(){
DDRC|=_BV(DDC7);
PORTC&=~_BV(DDC6);
PORTC&=~_BV(DDC7);
PORTC|=_BV(DDC6);
PORTC|=_BV(DDC7);
  }
void clk(){
PORTC|=_BV(DDC6);
PORTC&=~_BV(DDC6);
//delay(1);
  }
void DS1631startconvert(){
start();
//send address
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);//write
PORTC&=~_BV(DDC7);
clk();
//ignore ack
clk();
//start t convert command
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
clk();//ignoring ack
stop1();
}
void DS1631readtemp(){
start();
//send device address
//send address
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);//write
PORTC&=~_BV(DDC7);
clk();
//ignore ack
clk();
//send read temp command AAh
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
 clk();
 //digitalWrite(sda,LOW);
 PORTC&=~_BV(DDC7);
 clk();
 //digitalWrite(sda,HIGH);
 PORTC|=_BV(DDC7);
 clk();
 //digitalWrite(sda,LOW);
 PORTC&=~_BV(DDC7);
 clk();
 //digitalWrite(sda,HIGH);
 PORTC|=_BV(DDC7);
 clk();
 //digitalWrite(sda,LOW);
 PORTC&=~_BV(DDC7);
 clk();
 //digitalWrite(sda,HIGH);
 PORTC|=_BV(DDC7);
 clk();
 //digitalWrite(sda,LOW);
 PORTC&=~_BV(DDC7);
 clk();
 clk(); //ignoring ack again
 stop1();
 start();
 //send device address
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC|=_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);
PORTC&=~_BV(DDC7);
clk();
//digitalWrite(sda,HIGH);//read
PORTC|=_BV(DDC7);
clk(); 
//pinMode(sda,INPUT);//change pin from output to input for readin
PORTC|=B10000000; //pin must be set to 1 to properly read for avr
DDRC&=~_BV(DDC7);
byte raw=0;
clk();
//read the temp
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
  temp=temp+128;
 neg=1; 
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
   temp=temp+64;
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
  temp=temp+32; 
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
   temp=temp+16;
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
  temp=temp+8; 
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
   temp=temp+4;
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
  temp=temp+2; 
 }
 clk();
 //raw=digitalRead(sda);
 raw=PINC & _BV(PC7);
 if(raw==128){
   temp=temp+1;
 }
 clk();
 
//doing more significant read
/*
0000
.5 1
.25 2
.125 3
.0625 4


*/
//pinMode(sda,OUTPUT);
DDRC|=_BV(DDC7);
//digitalWrite(sda,LOW);
PORTC&=~_BV(DDC7);
clk();
PORTC|=B10000000; //pin must be set to 1 to properly read for avr

//pinMode(sda,INPUT);
DDRC&=~_BV(DDC7);
//raw=digitalRead(sda);
raw=PINC & _BV(PC7);
if(raw==128){
   tempb=tempb+.5;
 }
clk();
//raw=digitalRead(sda);
raw=PINC & _BV(PC7);
if(raw==128){
   tempb=tempb+.25;
 }
clk();
//raw=digitalRead(sda);
raw=PINC & _BV(PC7);
if(raw==128){
   tempb=tempb+.125;
 }
clk();
//raw=digitalRead(sda);
raw=PINC & _BV(PC7);
if(raw==128){
   tempb=tempb+.0625;
 }
clk();
clk();
clk();
clk();
clk();
clk();
stop1();

if (neg==1){
temp=temp-1;
temp=~(temp);
tempb=(tempb+temp)*-1;
}
else{
tempb=tempb+temp; 
}

}

