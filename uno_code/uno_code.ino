#include <SoftwareSerial.h>
#include <OneWire.h>
#include <DallasTemperature.h>

SoftwareSerial mySerial(10, 11); //rx, tx

// Data wire is plugged into port 2 on the Arduino
#define ONE_WIRE_BUS 2

// Setup a oneWire instance to communicate with any OneWire devices
OneWire oneWire(ONE_WIRE_BUS);

// Pass our oneWire reference to Dallas Temperature.
DallasTemperature sensors(&oneWire);


// Addresses of 3 DS18B20s
uint8_t sensor1[8] = { 0x28, 0x00, 0x84, 0x4C, 0x3B, 0x47, 0x04, 0xB3 };
uint8_t sensor2[8] = { 0x28, 0x00, 0x52, 0x36, 0x3B, 0x47, 0x06, 0x7E };
uint8_t sensor3[8] = { 0x28, 0x00, 0x3D, 0x52, 0x3B, 0x47, 0x05, 0x7C };
uint8_t sensor4[8] = { 0x28, 0xA5, 0x20, 0x79, 0x97, 0x08, 0x03, 0xAC };
uint8_t sensor5[8] = { 0x28, 0xD8, 0xCB, 0x6A, 0x12, 0x19, 0x01, 0xA7 };
uint8_t sensor6[8] = { 0x28, 0xFF, 0x6F, 0xD4, 0xA4, 0x16, 0x05, 0x28 };

char Temp1[10], Temp2[10], Temp3[10], Temp4[10], Temp5[10], Temp6[10];
char data[200];

String minta; //minta data ke esp

void setup(void) {
  Serial.begin(9600);
  mySerial.begin(9600);
  sensors.begin();
}

void loop(void) {
  //baca permintaan dari esp
  while (mySerial.available() > 0) {
    char in = mySerial.read();
    minta += in;
  }

  minta.trim();
  //uji variabel minta
  if (minta == "ya") {
    sensors.requestTemperatures();

    String data1 = dtostrf(printTemperature(sensor1), 5, 2, Temp1);
    String data2 = dtostrf(printTemperature(sensor2), 5, 2, Temp2);
    String data3 = dtostrf(printTemperature(sensor3), 5, 2, Temp3);
    String data4 = dtostrf(printTemperature(sensor4), 5, 2, Temp4);
    String data5 = dtostrf(printTemperature(sensor5), 5, 2, Temp5);
    String data6 = dtostrf(printTemperature(sensor6), 5, 2, Temp6);

    mySerial.println(data1 + '#'
                     + data2 + '#'
                     + data3 + '#'
                     + data4 + '#'
                     + data5 + '#'
                     + data6);
  }

  //cek ulang isi variabel dari esp
  if (minta != "") {
    Serial.println(minta);  
  }
  //delayMicroseconds(10);
  //kosongkan variabel minta
  minta = "";

  delay(1000);
}

float printTemperature(DeviceAddress deviceAddress)
{
  float tempC = sensors.getTempC(deviceAddress);
  return tempC;
}
