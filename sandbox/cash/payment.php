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
            "fullName": "First name and second buyer  name",
            "emailAddress": "buyer_test@test.com",
            "contactPhone": "7563126",
            "dniNumber": "5415668464654",
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
	  "type": "AUTHORIZATION_AND_CAPTURE",
      "paymentMethod": "EFECTY",
      "expirationDate": "{{expiration_date}}",
      "paymentCountry": "CO",
      "ipAddress": "127.0.0.1"
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
