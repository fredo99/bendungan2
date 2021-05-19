#include <ArduinoJson.h>
#include <CTBot.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#define TRIGGER_PIN 2
#define ECHO_PIN 14
//#define CW 13  //Input 3 motor dc
//#define CCW 12 //Input 4 motor dc
//#define enB 15 //motor DC
//#define kec_motor 0 //kecepatan motor DC

//koneksi jaringan
String ssid = "Kencangkali";
String password = "tanyayangpunya";
String host = "192.168.1.8"; //alamat IP Server
String token = "1666956053:AAGMfRXYYKqv8hAgyhNnwc0Algl8dp28sgc";
int id = 1216699815;
int kec_motor = 0;
int CW = 13;  //Input 3 motor dc
int CCW = 12; //Input 4 motor dc
int enB = 15;
StaticJsonDocument<1000> doc;

WiFiClient client;
CTBot bot;

//variabel
long duration, distance, jarak_asli;
String status_pintu, status_ketinggian, status_pintu_terakhir;
String url;
//float ket_terbuka, ket_tertutup;

void setup()
{
  Serial.begin(9600);
  //pinMode
  pinMode(TRIGGER_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);
  pinMode(CW, OUTPUT);
  pinMode(CCW, OUTPUT);
  pinMode(enB, OUTPUT);

  //setting wifi
  WiFi.hostname("Bendungan");
  WiFi.begin(ssid, password);
  bot.wifiConnect(ssid, password);
  bot.setTelegramToken(token);

  //cek koneksi telegram
  if (bot.testConnection())
  {
    Serial.println("\ntestConnection OK");
  }
  else
  {
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
    url = "/bendungan2/Mikrokontroler/ambil";

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
  if (data != "")
  {
    DeserializationError error = deserializeJson(doc, data);
    if (error)
    {
      Serial.print(F("deserializeJson() failed: "));
      Serial.println(error.f_str());
      return;
    }
    else
    { // parsing data success
      status_pintu_terakhir = doc[0]["status"].as<String>();
      Serial.println("Status Pintu Terkhir  : " + status_pintu_terakhir);
    }
  }
  else
  {
    Serial.println("No Data Loaded!");
  }
}

void loop()
{
  jarak_asli= 17-distance; //mengatur ketinggian bendungan dikurangi hasil sensor
  kec_motor = 255;
  analogWrite(enB, kec_motor);
  
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
      url = "/bendungan2/Mikrokontroler/simpan?ket_air=";
      url += jarak_asli;

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
  if (data != "")
  {
    DeserializationError error = deserializeJson(doc, data);
    if (error)
    {
      Serial.print(F("deserializeJson() failed: "));
      Serial.println(error.f_str());
      return;
    }
    else
    { // parsing data success
      status_pintu = doc[0]["status"].as<String>();
      status_ketinggian = doc[1]["status_ketinggian"].as<String>();
      Serial.println("");
      Serial.println("Status Pintu          : " + status_pintu);
      Serial.println("Status Ketinggian     : " + status_ketinggian);
    }
  }
  else
  {
    Serial.println("No Data Loaded!");
  }
  if (status_pintu == "0" && status_pintu_terakhir == "0")
  {
    Serial.println("Tertutup");
    status_pintu_terakhir = "0";
  }
  else if (status_pintu == "0" && status_pintu_terakhir == "1")
  { // mau menutup dari terbuka penuh

    // mengatur kecepatan motor
    kec_motor = 100;
    analogWrite(enB, kec_motor);
    
    digitalWrite(CCW, LOW);
    digitalWrite(CW, HIGH);
    delay(1000);
    digitalWrite(CW, LOW);
    digitalWrite(CCW, LOW);
    Serial.println("Tertutup");
    status_pintu_terakhir = "0";
  }
  else if (status_pintu == "0" && status_pintu_terakhir == "2")
  { // mau menutup dari terbuka setengah

    // mengatur kecepatan motor
    kec_motor = 100;
    analogWrite(enB, kec_motor);
    
    digitalWrite(CCW, LOW);
    digitalWrite(CW, HIGH);
    delay(700);
    digitalWrite(CW, LOW);
    digitalWrite(CCW, LOW);
    Serial.println("Tertutup");
    status_pintu_terakhir = "0";
  }
  if (status_pintu == "1" && status_pintu_terakhir == "0")
  { //dari menutup akan terbuka penuh
    digitalWrite(CW, LOW);
    digitalWrite(CCW, HIGH);
    delay(750);
    digitalWrite(CW, LOW);
    digitalWrite(CCW, LOW);
    Serial.println("TERBUKA PENUH");
    status_pintu_terakhir = "1";
  }
  else if (status_pintu == "1" && status_pintu_terakhir == "1")
  { //tetap
    Serial.println("TERBUKA PENUH");
    status_pintu_terakhir = "1";
  }
  else if (status_pintu == "1" && status_pintu_terakhir == "2")
  {
    digitalWrite(CW, LOW);
    digitalWrite(CCW, HIGH);
    delay(475);
    digitalWrite(CW, LOW);
    digitalWrite(CCW, LOW);
    Serial.println("Terbuka Penuh");
    status_pintu_terakhir = "1";
  }
  if (status_pintu == "2" && status_pintu_terakhir == "0")
  {
    digitalWrite(CW, LOW);
    digitalWrite(CCW, HIGH);
    delay(475);
    digitalWrite(CW, LOW);
    digitalWrite(CCW, LOW);
    Serial.println("TERBUKA SEBAGIAN");
    status_pintu_terakhir = "2";
  }
  else if (status_pintu == "2" && status_pintu_terakhir == "1")
  {
    // mengatur kecepatan motor
    kec_motor = 100;
    analogWrite(enB, kec_motor);
    
    digitalWrite(CCW, LOW);
    digitalWrite(CW, HIGH);
    delay(700);
    digitalWrite(CW, LOW);
    digitalWrite(CCW, LOW);
    Serial.println("TERBUKA SEBAGIAN");
    status_pintu_terakhir = "2";
  }
  else if (status_pintu == "2" && status_pintu_terakhir == "2")
  {
    Serial.println("TERBUKA SEBAGIAN");
    status_pintu_terakhir = "2";
  }
  if (status_ketinggian == "1")
  {
    String ketinggian = "Ketinggian air : ";
    ketinggian += distance;
    ketinggian += " Cm\n";
    ketinggian += "Status air : BAHAYA\n";
    ketinggian += "Ketinggian melebihi batas ketinggian terbuka!\n";
    bot.sendMessage(id, ketinggian);
    Serial.println("BAHAYA");
  }
  else if (status_ketinggian == "2")
  {
    String ketinggian = "Ketinggian air : ";
    ketinggian += distance;
    ketinggian += " Cm\n";
    ketinggian += "Status air : HATI-HATI\n";
    ketinggian += "Ketinggian masih dalam taraf wajar\n";
    bot.sendMessage(id, ketinggian);
    Serial.println("HATI-HATI");
  }
  else if (status_ketinggian == "3")
  {
    String ketinggian = "Ketinggian air : ";
    ketinggian += distance;
    ketinggian += " Cm\n";
    ketinggian += "Status air : AMAN\n";
    ketinggian += "Ketinggian dibawah batas ketinggian tertutup!\n";
    bot.sendMessage(id, ketinggian);
    Serial.println("AMAN");
  }
  delay(1000);
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
