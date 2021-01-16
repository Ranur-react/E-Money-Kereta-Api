
#include <SPI.h>
#include <Ethernet.h>
#include <MFRC522.h>
 
#define SS_PIN 53
#define RST_PIN 5
MFRC522 mfrc522(SS_PIN, RST_PIN);   
#include <SoftwareSerial.h>
#include  <Wire.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27,20,4); 
//                     end--------------------------
//mp3 declarate
#include <DFPlayer_Mini_Mp3.h>
SoftwareSerial mySerial(6, 7); // RX, TX
//end
//MOTOR DELCARATE
#include <Servo.h>
Servo motorServo; 

String bacadata="antah";
String data="";
String c="";
String saldo=c;
double saldonum=0;
String idcard="";
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; 
char server[]="keretaapi.e-lock.site"; 
String host="Host: keretaapi.e-lock.site"; 

EthernetClient client;
void setup() {
  Serial.begin(9600);
  
  mySerial.begin (9600);
  mp3_set_serial (mySerial);  
  delay(10); 
  mp3_set_volume (100);\
  
  Ethernet.begin(mac);
  lcd.init();
  lcd.backlight();
  lcd.setCursor(0,0);
  lcd.print("Bersiap-siap . .");
  motorServo.attach(4);
  motorServo.write(125);

//   RFID
SPI.begin();      // Init SPI bus
  mfrc522.PCD_Init();   // Init MFRC522
  mfrc522.PCD_DumpVersionToSerial();  // Show details of PCD - MFRC522 Card Reader details
   delay(1000); 

}




void loop() {
  cetak("Ready..","TAP  CARD here");
  PANGGIL_ESEKUSI_RFID_();
    delay(100);
}

void PANGGIL_ESEKUSI_RFID_(){
  if ( ! mfrc522.PICC_IsNewCardPresent()) 
  {return;}
  if ( ! mfrc522.PICC_ReadCardSerial()) 
  {return;}
   mfrc522.PICC_DumpToSerial(&(mfrc522.uid));
    byte letter;
    String content= "";
  for (byte i = 0; i < mfrc522.uid.size; i++) 
  {
     cetak(String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : ""),String(mfrc522.uid.uidByte[i], HEX));
//     delay(10);
     content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? "0" : ""));
     content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println("** JARINGAN : ");
  content.toUpperCase();
  idcard=content;
  Serial.print(idcard);
  delay(1000);
  ESEKUSI_ID();
}




  void ESEKUSI_ID(){
     cetak("ID CARD : ",idcard);
     cetak("Card Succses","Terbaca");
   delay(100);
     bacadata="";
     bacadata=idcard;
  VALIDASIDATA();
     if(c=="HIGH"){
     cetak("ID SUDAH TERDAFTAR ","");
     GETSALDOonly();
     if(saldonum>=5000){
    KURANGI_SALDO();
    delay(2000);                    
    cetak("Silahkan Duduk"," Di Kereta");
           mp3_play (2);
           motorServo.write(40);  
           delay(1000);            
           GETSALDO();
           delay(100);  delay(3000);  
             motorServo.write(125);  
              delay(1000);      
      }else{
   


              cetak("Saldo Habis"," / tidak cukup");
           mp3_play (3);         
           delay(100);  delay(3000);  
             motorServo.write(125);  
              delay(1000);  
        }
   
      } else {
        cetak("BELUM TERDAFTAR!","HUBUNGI ADMIN");
        delay(1000);   
        mp3_play (1); 
        delay(2000);
        cetak(" Load. . . .","");
        ///Pendaftaran kartu secara Otomatis
//        REG_ID();
        //end-reg
        delay(100);
        }
      delay(100);
  }
void KURANGI_SALDO(){
    bacadata.trim();    
    if (client.connect(server, 80)) {    
    Serial.print("GET Connect");
    client.println("GET /Arduino/Validasi.php?data1="+bacadata+"&data2="+5000+" HTTP/1.0");
    client.println(host);
    client.println("Connection: close");
    client.println();

    delay(100);
   String data= client.readString();
      Serial.print("----Jumlah Karakter------");
      Serial.print(data.length());
      Serial.print("----------");
      c= data.substring(260); //Karakter Statis
      c.trim();    
      //String i= data.substring(1); //DHC Karakter
      Serial.print("----Jumlah Karakter------");
      Serial.print(c);
      Serial.print("@__\n");
    }else{
     cetak("EROR VALSI!!","Unconnected!!");
     delay(100);
        //     ---------------end 
    }
    client.stop();
  }
  void VALIDASIDATA(){
    bacadata.trim();    
    if (client.connect(server, 80)) {    
    Serial.print("GET Connect");
    client.println("GET /Validasi.php?data1="+bacadata+" HTTP/1.0");
    client.println(host);
    client.println("Connection: close");
    client.println();

    delay(100);
   String data= client.readString();
      Serial.print("----Jumlah Karakter------");
      Serial.print(data.length());
      Serial.print("----------");
      c= data.substring(177); //Karakter Statis
      c.trim();    
      //String i= data.substring(1); //DHC Karakter
      Serial.print("----Jumlah Karakter------");
      Serial.print(c);
      Serial.print("@__\n");
    }else{
     cetak("EROR VALSI!!","Unconnected!!");
     delay(100);
        //     ---------------end 
    }
    client.stop();
    }

void REG_ID(){  
      if(bacadata.length()>8){
        bacadata=bacadata.substring(0);
      }
      bacadata.trim();
if (client.connect(server, 80)) {    
    Serial.print("GET Connect");
    client.println("GET /Arduino/tambah.php?data1="+bacadata+" HTTP/1.1");
    client.println(host);
    client.println("Connection: close");
    client.println();
//    cetak("Tampilan WEB__",client.readString()); 
    cetak("BERHASIL MENDAF","TARKAN USER BARU");
      delay(2000);
    }else{
     cetak("EROREGIS!!","Unconnected!!");
     delay(100);
        //     ---------------end 
    }
    client.stop();
}
void GETSALDOonly(){
  bacadata.trim();    
    if (client.connect(server, 80)) {    
    Serial.print("GET Connect");
    client.println("GET /index.php/C_rfid/CekSaldo/"+bacadata+" HTTP/1.1");
    client.println(host);
    client.println("Connection: close");
    client.println();

    delay(100);
   String data= client.readString();
   String x="";
      Serial.print("----Jumlah KarakterSALDOONLY------");
      Serial.print(data.length());
      Serial.print("----------");
      x= data.substring(422); //Karakter Statis
      x.trim();    
      //String i= data.substring(1); //DHC Karakter
      Serial.print("----Jumlah KarakterSALDOONLY------");
      Serial.print(x);
      char buf[32];
      saldonum=x.toInt();
      //saldo=String(ltos(c.toInt(), buf, 10));
//       cetak(" Rp. "+saldo,"Saldo Kurang");
      Serial.print("@__\n"+data);
    }else{
     cetak("EROR Det SAldo!!","Unconnected!!");
     delay(1000);
        //     ---------------end 
    }
    client.stop();
    }
  void GETSALDO(){
     bacadata.trim();    
    if (client.connect(server, 80)) {    
    Serial.print("GET Connect");
    client.println("GET /index.php/C_rfid/CekSaldo/"+bacadata+" HTTP/1.1");
    client.println(host);
    client.println("Connection: close");
    client.println();

    delay(100);
   String data= client.readString();
   String x="";
      Serial.print("----Jumlah KarakterSALDOONLY------");
      Serial.print(data.length());
      Serial.print("----------");
      x= data.substring(422); //Karakter Statis
      x.trim();    
      //String i= data.substring(1); //DHC Karakter
      Serial.print("----Jumlah KarakterSALDOONLY------");
      Serial.print(x);
      String v="";
      char buf[32];
      v=String(ltos(x.toInt(), buf, 10));
cetak("Sisa Saldo"," Rp. "+v);
      Serial.print("@__\n"+data);
    }else{
     cetak("EROR VALSI!!","Unconnected!!");
     delay(1000);
        //     ---------------end 
    }
    client.stop();
    }


void cetak(String l1,String l2){
   lcd.clear();
   lcd.setCursor(0,0);
   lcd.print(l1);
   lcd.setCursor(0,1);
   lcd.print(l2);
   
    Serial.print("\n");
    Serial.print(l1);
    Serial.print("\n");
    Serial.print(l2);
  }



char *ultos_recursive(unsigned long val, char *s, unsigned radix, int pos)
{
  int c;
  if (val >= radix)
    s = ultos_recursive(val / radix, s, radix, pos+1);
  c = val % radix;
  c += (c < 10 ? '0' : 'a' - 10);
  *s++ = c;
  if (pos % 3 == 0) *s++ = ',';
  return s;
}

char *ltos(long val, char *s, int radix)
{
  if (radix < 2 || radix > 36) {
    s[0] = 0;
  } else {
    char *p = s;
    if (radix == 10 && val < 0) {
      val = -val;
      *p++ = '-';
    }
    p = ultos_recursive(val, p, radix, 0) - 1;
    *p = 0;
  }
  return s;
}

  
