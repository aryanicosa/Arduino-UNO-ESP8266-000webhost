#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

String sData;
String arrData[6];
String myData;
bool parsing = false;
unsigned long millisTadi = 0;
const long interval = 15000;

/* Set these to your desired credentials. */
const char *ssid = "Cucu Mbah";  //ENTER YOUR WIFI SETTINGS
const char *password = "Embuh1133335";

//Link to read data from https://jsonplaceholder.typicode.com/comments?postId=7
//Web/Server address to read/write from
const char *host = "kalibrasisuhu.000webhostapp.com";
const int httpsPort = 443;  //HTTPS= 443 and HTTP = 80

//SHA1 finger print of certificate use web browser to view and copy
const char fingerprint[] PROGMEM = "5B FB D1 D4 49 D3 0F A9 C6 40 03 34 BA E0 24 05 AA D2 E2 01";
//=======================================================================
//                    Power on setup
//=======================================================================

void setup() {
  delay(1000);
  Serial.begin(9600); //bisa diganti 9600
  //mySerial.begin(9600);
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //Only Station No AP, This line hides the viewing of ESP as wifi hotspot

  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}

//=======================================================================
//                    Main Program Loop
//=======================================================================
void loop() {
  if (millis() - millisTadi >= interval) {
    millisTadi = millis();

    while (Serial.available() > 0) {
      char in = Serial.read();
      sData += in;
    }

    sData.trim();

    if (sData != "") {
      //format data "data#data"
      int index = 0;
      for  (int i = 0; i <= sData.length(); i++) {
        char delimiter = '#';
        if (sData[i] != delimiter)
          arrData[index] += sData[i];
        else
          index++; //variabel index bertambah 1
      }

      //pastikan data lengkap
      if (index == 5) {
        // tampilkan nilai ke serial monitor
        //Serial.println(arrData[0]);
        //Serial.println(arrData[1]);
        //Serial.println(arrData[2]);
        //Serial.println(arrData[3]);
        //Serial.println(arrData[4]);
        //Serial.println(arrData[5]);


        WiFiClientSecure httpsClient;    //Declare object of class WiFiClient

        Serial.println(host);

        Serial.printf("Using fingerprint '%s'\n", fingerprint);
        httpsClient.setFingerprint(fingerprint);
        httpsClient.setTimeout(15000); // 15 Seconds
        delay(1000);

        Serial.println("HTTPS Connecting");
        int r = 0; //retry counter
        while ((!httpsClient.connect(host, httpsPort)) && (r < 30)) {
          delay(100);
          Serial.print(".");
          r++;
        }
        if (r == 30) {
          Serial.println("Connection failed");
        }
        else {
          Serial.println("Connected to web");
        }

        String getData, Link, contentLength;

        //POST Data
        Link = "/terimaInputDariSensor.php";
        getData = "T1=" + arrData[0] +
                  "&T2=" + arrData[1] +
                  "&T3=" + arrData[2] +
                  "&T4=" + arrData[3] +
                  "&T5=" + arrData[4] +
                  "&T6=" + arrData[5] ;
        contentLength = getData.length();

                  Serial.print("requesting URL: ");
        Serial.println(host);

        httpsClient.print(String("POST ") + Link + " HTTP/1.1\r\n" +
                          "Host: " + host + "\r\n" +
                          "Content-Type: application/x-www-form-urlencoded" + "\r\n" +
                          "Content-Length: " + contentLength + "\r\n\r\n" +
                          getData +
                          "\r\n" +
                          "Connection: close\r\n\r\n");

        Serial.println("request sent");

        while (httpsClient.connected()) {
          String line = httpsClient.readStringUntil('\n');
          if (line == "\r") {
            Serial.println("headers received");
            break;
          }
        }

        Serial.println("reply was:");
        Serial.println("==========");
        String line;
        while (httpsClient.available()) {
          line = httpsClient.readStringUntil('\n');  //Read Line by Line
          Serial.println(line); //Print response
        }
        Serial.println("==========");
        Serial.println("closing connection");

      }

      arrData[0] = "";
      arrData[1] = "";
      arrData[2] = "";
      arrData[3] = "";
      arrData[4] = "";
      arrData[5] = "";
    }
    //kosongkan data masuk
    sData = "";
    //minta data kembali dengan kata ya
    Serial.println("ya");
    //Serial.println("ok");
  }

}
//=======================================================================
