<?php
/**
 * @author Miller Juma
 * @time 9:12:45am
 * @date Monday,April 20,2020
 * 
 *
 * @var $consumer_key
 * @var $consumer_secret
 */
$consumer_key='your consumer key';
$consumer_secret='your consumer secret';

$url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
$credentials = base64_encode($consumer_key.':'.$consumer_secret);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$curl_response = curl_exec($curl);

$access_token=json_decode($curl_response)->access_token;

$register_url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
$simulate_url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
curl_setopt($curl,CURLOPT_URL,$register_url);
$header=[
  'Content-Type:application/json',
  'Authorization:Bearer '.$access_token
];
curl_setopt($curl,CURLOPT_URL,$register_url);
curl_setopt($curl,CURLOPT_URL,$simulate_url);
curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
/**
 * post data
 * @var $curl_post_data
 */
$curl_post_data=[
  'ShortCode'     =>'601426',
  'ResponseTye'   =>'Completed',
  'ConfirmationURL'=>'https://d0fd254f.ngrok.io/c2b/confirmation.php',
  'ValidationURL' =>'https://d0fd254f.ngrok.io/c2b/validation.php',
  'CommandID'     =>'CustomerPayBillOnline',
  'Amount'        =>'1',
  'Msisdn'        => '254708374149',
  'BillRefNumber' => 'Millerjuma' 
];
$post_string=json_encode($curl_post_data);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$post_string);

$curl_response=curl_exec($curl);

print_r($curl_response);

  