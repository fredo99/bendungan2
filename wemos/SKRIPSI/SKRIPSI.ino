#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#define TRIGGER_PIN  2  
#define ECHO_PIN     14
#define CW           13  //relay 1 
#define CCW          12  //relay 2

//koneksi jaringan
const char* ssid = "Bayar Cuyy!!!!";
const char* password = "tanyayangpunya";
const char* host = "192.168.1.5"; //alamat IP Server
StaticJsonDocument<1000> doc;

WiFiClient client;

//variabel
long duration, distance;
String status_pintu, url;

void setup() {
  Serial.begin(9600);
  //pinMode
  pinMode(TRIGGER_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);
  pinMode(CW, OUTPUT);
  pinMode(CCW, OUTPUT);
  digitalWrite(CW, HIGH);
  digitalWrite(CCW, HIGH);

  //setting wifi
  WiFi.hostname("Bendungan");
  WiFi.begin(ssid, password);

  //cek koneksi
  while(WiFi.status() != WL_CONNECTED)
  {
  //mencoba koneksi
    Serial.print(".");
    delay(500);
  }

  //sudah connect dan cek ip
  Serial.println("WiFi Connected");
  Serial.println(WiFi.localIP());

}

void loop() {
  String data ="";
  bool parse_json = false;
  ketinggian_air();
  if(isnan(distance)){
    
  }else{
    //koneksi ke server
    WiFiClient client;
    if(client.connect(host, 80))
    {
      Serial.print("connecting to ");
      Serial.println(host);
      //proses pengiriman data ke server
      HTTPClient http;
      url = "/Bendungan2/Pages/simpan?ket_air=";
      url+= distance;
      
      client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Content-Type: application/json\r\n" + "Connection: close\r\n\r\n");
      // Read all the lines of the reply from server and print them to Serial
      while(client.connected() || client.available()){ // baca karakter 1 per satu untuk dimasukan ke string D sebagai bentuk json nantinya
        if (client.available()){
          char c = client.read();
          if(c == '{') {
            parse_json = true;
          }
          if(parse_json){
            data += c;
          }
        }
      }
      client.stop();
    } else
    {
      Serial.println("Connection Failed");
      client.stop();
      return;
    }
  }

   Serial.println(data);
   //parsing JSON
    if (data != "") {
      DeserializationError error = deserializeJson(doc, data);
      if (error){
        Serial.print(F("deserializeJson() failed: "));
        Serial.println(error.f_str());
        return;
      }else{ // parsing data success
          ket_terbuka = doc[0]["0"].as<String>();
          ket_tertutup = doc[1]["1"].as<String>();
          status_pintu = doc[2]["status"].as<String>();
          
          Serial.println("Ketinggian terbuka  : " +ket_terbuka);
          Serial.println("Ketinggian tertutup : " +ket_tertutup);
          Serial.println("Status Pintu        : " +status_pintu);
      }
    }else{
      Serial.println("No Data Loaded!");
    }

    if(status_pintu == 0){ // KONDISI TERTUTUP
    if(distance >= ket_terbuka){ // ketinggian air lebih besar dari batas ket_terbuka dan kondisi pintu tertutup
    digitalWrite(CW, LOW);
    delay(500);
    digitalWrite(CCW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("TERBUKA PENUH");
     } else if(distance > ket_tertutup && distance < ket_terbuka) { // ketinggain air diantara ket_terbuka dan ket_tertutup dan kondisi pintu tertutup
      digitalWrite(CW, LOW);
      delay(250);
      digitalWrite(CCW, HIGH);
      delay(1000);
      digitalWrite(CW, HIGH);
      digitalWrite(CCW, HIGH);
      delay(1000);
      Serial.println("TERBUKA 1/2");
       }else if(distance <= ket_tertutup){ // kketinggian air kurang dari batas ket_tertutup dan kondisi pintu tertutup
        Serial.println("Tertutup");
       }
  } if(status_pintu == 1){ // KONDISI TERBUKA PENUH
      if(distance >= ket_terbuka){ // ketinggian air lebih besar dari batas ket_terbuka dan kondisi pintu terbuka penuh
      delay(1000);
      Serial.println("TERBUKA PENUH");
      }else if(distance > ket_tertutup && distance < ket_terbuka){ // ketinggain air diantara ket_terbuka dan ket_tertutup dan kondisi pintu terbuka penuh
        digitalWrite(CCW, LOW);
        delay(250);
        digitalWrite(CW, HIGH);
        delay(1000);
        digitalWrite(CW, HIGH);
        digitalWrite(CCW, HIGH);
        delay(1000);
        Serial.println("TERBUKA 1/2");
     }else if(distance <= ket_tertutup){ // ketinggian air kurang dari batas ket_tertutup dan kondisi pintu terbuka penuh
      digitalWrite(CCW, LOW);
      delay(500);
      digitalWrite(CW, HIGH);
      delay(1000);
      digitalWrite(CW, HIGH);
      digitalWrite(CCW, HIGH);
      delay(1000);
      Serial.println("Tertutup");
     }
  } if(status_pintu == 2){ //KONDISI TERBUKA SEBAGIAN
     if (distance >= ket_terbuka){ // ketinggian air kurang dari batas ket_terbuka dan kondisi pintu terbuka sebagian
      //searah jarum jam
      digitalWrite(CW, LOW);
      delay(250);
      digitalWrite(CCW, HIGH);
      delay(1000);
      digitalWrite(CW, HIGH);
      digitalWrite(CCW, HIGH);
      delay(1000);
      Serial.println("TERBUKA PENUH");
     }else if(distance > ket_tertutup && distance < ket_terbuka){ // ketinggain air diantara ket_terbuka dan ket_tertutup0 dan kondisi pintu terbuka sebagian
       Serial.println("TERBUKA 1/2");
     } else if(distance <= ket_tertutup){ // ketinggian air kurang dari batas ket_tertutup dan kondisi pintu terbuka sebagian
      digitalWrite(CCW, LOW);
      delay(250);
      digitalWrite(CW, HIGH);
      delay(1000);
      digitalWrite(CW, HIGH);
      digitalWrite(CCW, HIGH);
      delay(1000);
      Serial.println("Tertutup");
     }

}

void ketinggian_air(){
  digitalWrite(TRIGGER_PIN, LOW);
  delay(1000); // Added this line
  digitalWrite(TRIGGER_PIN, HIGH);
  delay(1000); // Added this line
  digitalWrite(TRIGGER_PIN, LOW);
  duration = pulseIn(ECHO_PIN, HIGH);
  distance = (duration/2) / 29.1;
  Serial.print(distance);
  Serial.println(" cm");
}
