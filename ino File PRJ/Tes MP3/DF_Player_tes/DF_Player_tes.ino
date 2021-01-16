#include <SoftwareSerial.h>
#include <DFPlayer_Mini_Mp3.h>

SoftwareSerial mySerial(6, 7);

void setup () {
Serial.begin (9600);
mySerial.begin (9600);
mp3_set_serial (mySerial);
delay(10);

mp3_set_volume (25);
delay(10);
mp3_play ();
delay(10);
mp3_play (1);
delay(10);
}

void loop () {

}
