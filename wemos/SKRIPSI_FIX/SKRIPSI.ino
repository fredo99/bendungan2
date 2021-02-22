#include <ArduinoJson.h>
#include <CTBot.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#define TRIGGER_PIN 2
#define ECHO_PIN 14
#define CW 13  //relay 1
#define CCW 12 //relay 2

//koneksi jaringan
String ssid = "Bayar Cuyy!!!!";
String password = "tanyayangpunya";
String host = "192.168.1.6"; //alamat IP Server
String token = "1666956053:AAGMfRXYYKqv8hAgyhNnwc0Algl8dp28sgc";
int id = 1216699815;
StaticJsonDocument<1000> doc;

WiFiClient client;
CTBot bot;

//variabel
long duration, distance;
String status_pintu, status_ketinggian, status_pintu_terakhir;
String url, otomatisasi, status_pintu_manual;
//float ket_terbuka, ket_tertutup;

void setup()
{
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
  bot.wifiConnect(ssid, password);
  bot.setTelegramToken(token);

  //cek koneksi telegram
  if (bot.testConnection()){
    Serial.println("\ntestConnection OK");
  }else{
    Serial.println("\ntestConnection NOK");
  }
  
  //cek koneksi
  while (WiFi.status() != WL_CONNECTED)
  {
    //mencoba koneksi
    Serial.print(".");
    delay(500);
  }

  //sudah connect dan cek ip
  Serial.println("WiFi Connected");
  Serial.println(WiFi.localIP());
  //ambil data pintu terakhir
  String data = "";
  bool parse_json = false;
  //koneksi ke server
    WiFiClient client;
    if (client.connect(host, 80))
    {
      Serial.print("connecting to ");
      Serial.println(host);
      //proses pengiriman data ke server
      HTTPClient http;
      url = "/bendungan2/Pages/ambil";

      client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Content-Type: application/json\r\n" + "Connection: close\r\n\r\n");
      // Read all the lines of the reply from server and print them to Serial
      while (client.connected() || client.available())
      { // baca karakter 1 per satu untuk dimasukan ke string C sebagai bentuk json nantinya
        if (client.available())
        {
          char c = client.read();
          if (c == '[')
          {
            parse_json = true;
          }
          if (parse_json)
          {
            data += c;
          }
        }
      }
      client.stop();
    }
    else
    {
      Serial.println("Connection Failed");
      client.stop();
      return;
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
          status_pintu_terakhir = doc[0]["status"].as<String>();
          Serial.println("Status Pintu Terkhir  : "  +status_pintu_terakhir);

      }
    }else{
      Serial.println("No Data Loaded!");
    }
}

void loop()
{
//  TBMessage msg;
  String data = "";
  bool parse_json = false;
  ketinggian_air();
  if (isnan(distance))
  {
  }
  else
  {
    //koneksi ke server
    WiFiClient client;
    if (client.connect(host, 80))
    {
      Serial.print("connecting to ");
      Serial.println(host);
      //proses pengiriman data ke server
      HTTPClient http;
      url = "/bendungan2/Pages/simpan?ket_air=";
      url += distance;

      client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "Content-Type: application/json\r\n" + "Connection: close\r\n\r\n");
      // Read all the lines of the reply from server and print them to Serial
      while (client.connected() || client.available())
      { // baca karakter 1 per satu untuk dimasukan ke string D sebagai bentuk json nantinya
        if (client.available())
        {
          char c = client.read();
          if (c == '[')
          {
            parse_json = true;
          }
          if (parse_json)
          {
            data += c;
          }
        }
      }
      client.stop();
    }
    else
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
          status_pintu = doc[0]["status"].as<String>();
          Serial.println("");
          Serial.println("Status Pintu          : " +status_pintu);

      }
    }else{
      Serial.println("No Data Loaded!");
    }
  if (status_pintu == "0" && status_pintu_terakhir == "0"){
    Serial.println("TERBUKA tertutup");
    status_pintu_terakhir = "0";
  }else if (status_pintu == "0" && status_pintu_terakhir == "1"){// mau menutup dari terbuka penuh
    digitalWrite(CCW, LOW);
    delay(500);
    digitalWrite(CW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("Tertutup");
    status_pintu_terakhir = "0";
  }else if (status_pintu == "0" && status_pintu_terakhir == "2"){ // mau menutup dari terbuka setengah
    digitalWrite(CCW, LOW);
    delay(250);
    digitalWrite(CW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("Tertutup");
    status_pintu_terakhir = "0";
  }
  if (status_pintu == "1" && status_pintu_terakhir == "0"){ //dari menutup akan terbuka penuh
    digitalWrite(CW, LOW);
    delay(500);
    digitalWrite(CCW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("TERBUKA PENUH");
    status_pintu_terakhir = "1";
  }else if (status_pintu == "1" && status_pintu_terakhir == "1" ){ //tetap
    Serial.println("TERBUKA PENUH");
    status_pintu_terakhir = "1";
  }else if (status_pintu == "1" && status_pintu_terakhir == "2"){
    digitalWrite(CW, LOW);
    delay(250);
    digitalWrite(CCW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("Terbuka Penuh");
    status_pintu_terakhir = "1";
  }
  if (status_pintu == "2" && status_pintu_terakhir == "0"){
    digitalWrite(CCW, LOW);
    delay(250);
    digitalWrite(CW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("TERBUKA SEBAGIAN");
    status_pintu_terakhir = "2";
  }else if (status_pintu == "2" && status_pintu_terakhir == "1"){
    digitalWrite(CW, LOW);
    delay(250);
    digitalWrite(CCW, HIGH);
    delay(1000);
    digitalWrite(CW, HIGH);
    digitalWrite(CCW, HIGH);
    delay(1000);
    Serial.println("TERBUKA SEBAGIAN");
    status_pintu_terakhir = "2";
  }else if (status_pintu == "2" && status_pintu_terakhir == "2"){
    Serial.println("TERBUKA SEBAGIAN");
    status_pintu_terakhir = "2";
  }
    if(status_ketinggian == "1"){
    String ketinggian = "Ketinggian air : ";
    ketinggian += distance;
    ketinggian += " Cm\n";
    ketinggian += "Ketinggian melebihi batas ketinggian terbuka!\n";
    ketinggian += "Status air : BAHAYA\n";
    bot.sendMessage(id, ketinggian);
    Serial.println("BAHAYA");
    }else if(status_ketinggian == "2"){
      String ketinggian = "Ketinggian air : ";
      ketinggian += distance;
      ketinggian += " Cm\n";
      ketinggian += "Status air : HATI-HATI\n";
      ketinggian += "Ketinggian masih dalam taraf wajar\n";
      bot.sendMessage(id, ketinggian);
      Serial.println("HATI-HATI");
    }else if(status_ketinggian == "3"){
      String ketinggian = "Ketinggian air : ";
      ketinggian += distance;
      ketinggian += " Cm\n";
      ketinggian += "Status air : AMAN\n";
      ketinggian += "Ketinggian dibawah batas ketinggian tertutup!\n";
      bot.sendMessage(id, ketinggian);
      Serial.println("AMAN");
  }
  delay(5000);
}

void ketinggian_air()
{
  digitalWrite(TRIGGER_PIN, LOW);
  delay(1000); // Added this line
  digitalWrite(TRIGGER_PIN, HIGH);
  delay(1000); // Added this line
  digitalWrite(TRIGGER_PIN, LOW);
  duration = pulseIn(ECHO_PIN, HIGH);
  distance = (duration / 2) / 29.1;
  Serial.print(distance);
  Serial.println(" cm");
}
