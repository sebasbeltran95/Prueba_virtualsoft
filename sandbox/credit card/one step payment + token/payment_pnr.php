<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://{{env}}.payulatam.com/payments-api/4.0/service.cgi',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
   "language": "es",
   "command": "SUBMIT_TRANSACTION",
   "merchant": {
      "apiKey": "{{api_key}}",
      "apiLogin": "{{api_login}}"
   },
   "transaction": {
      "order": {
         "accountId": "{{account_co}}",
         "referenceCode": "{{reference_code}}",
         "description": "Payment test description",
         "language": "es",
         "signature": "{{signature}}",
         "notifyUrl": "{{confirmation_page}}",
         "additionalValues": {
            "TX_VALUE": {
               "value": {{tx_value_co}},
               "currency": "{{currency_co}}"
         },
            "TX_TAX": {
               "value": 0,
               "currency": "{{currency_co}}"
         },
            "TX_TAX_RETURN_BASE": {
               "value": 0,
               "currency": "{{currency_co}}"
         }
         },
         "buyer": {
            "merchantBuyerId": "1",
            "fullName": "First name and second buyer name",
            "emailAddress": "buyer_test@test.com",
            "contactPhone": "7563126",
            "dniNumber": "123456789",
            "shippingAddress": {
               "street1": "calle 100",
               "street2": "5555487",
               "city": "Medellin",
               "state": "Antioquia",
               "country": "CO",
               "postalCode": "000000",
               "phone": "7563126"
            }
         },
         "shippingAddress": {
            "street1": "calle 100",
            "street2": "5555487",
            "city": "Medellin",
            "state": "Antioquia",
            "country": "CO",
            "postalCode": "0000000",
            "phone": "7563126"
         }
      },
      "payer": {
         "merchantPayerId": "1",
         "fullName": "First name and second payer name",
         "emailAddress": "payer_test@test.com",
         "contactPhone": "7563126",
         "dniNumber": "5415668464654",
         "billingAddress": {
            "street1": "calle 93",
            "street2": "125544",
            "city": "Bogota",
            "state": "Bogota DC",
            "country": "CO",
            "postalCode": "000000",
            "phone": "7563126"
         }
      },
      "creditCardTokenId": "{{token}}",
      "creditCard": {
         "securityCode": "123"
      },
      "extraParameters": {
         "INSTALLMENTS_NUMBER": 1
      },
      "type": "AUTHORIZATION_AND_CAPTURE",
      "paymentMethod": "VISA",
      "paymentCountry": "CO",
      "deviceSessionId": "vghs6tvkcle931686k1900o6e1",
      "ipAddress": "127.0.0.1",
      "cookie": "pt1t38347bs6jc9ruv2ecpv7o2",
      "userAgent": "Mozilla/5.0 (Windows NT 5.1; rv:18.0) Gecko/20100101 Firefox/18.0",
	  "pnr":{
         "id":"test001",
         "reservationAgent":{
            "id":"def456",
            "firstName":"",
            "lastName":"",
            "email":"diana.albarracin@payulatam.com",
            "officePhoneNumber":"7563126"
         },
         "reservationOffice":{
            "id":"312ad",
            "country":"CO"
         },
         "saleOffice":{
            "id":"31asd13a5",
            "country":"CO"
         },
         "passengers":[
            {
               "id":"3a1d31as35d",
               "country":"CO",
               "level":"1",
               "firstName":"Sebastian",
               "lastName":"Duque",
               "documentType":0,
               "documentNumber":"454524452424",
               "email":"diana.albarracin@payulatam.com",
               "officePhoneNumber":"7563126",
               "homePhoneNumber":"7563126",
               "mobilePhoneNumber":"7563126",
               "address":{
                  "country":"CO",
                  "city":"Bogota",
                  "street":"Calle 90"
               }
            },
            {
               "id":"a3d51as351",
               "country":"CO",
               "level":"1",
               "firstName":"Sebastian",
               "lastName":"Duque",
               "documentType":0,
               "documentNumber":"45644242425",
               "email":"sebastian.duque@payulatam.com",
               "officePhoneNumber":"7561326",
               "homePhoneNumber":"7561326",
               "mobilePhoneNumber":"7561326",
               "address":{
                  "country":"CO",
                  "city":"Bogota",
                  "street":"Calle 90"
               }
            }
         ],
         "itinerary":[
            {
              "departureDate":"2018-09-20T13:00:59",
               "arrivalDate":"2018-09-20T13:00:59",
               "flightNumber":"PQR345",
               "origin":"BOGOTA",
               "destination":"LIMA"
            },
            {
               "departureDate":"2018-09-20T13:00:59",
               "arrivalDate":"2018-09-20T13:00:59",
               "flightNumber":"TRE12365",
               "origin":"MEDELLIN",
               "destination":"LIMA"
               
            }
         ]
      }
   },
   "test": false
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
