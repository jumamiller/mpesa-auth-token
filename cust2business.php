<?php
/**
 * @var $url
 * generates token
 */
try{
  $url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
  /**
   * consumer credentials
   * @var $consumer_secret
   * @var $consumer_key
   */
  $consumer_key   ='D9WURM6T1uxb4NlATqqGKlzCS7GjHfd6';
  $consumer_secret='V926ag4DBX5axh6G';
  /**
   * generate the base64 token
   */
  $credentials=base64_encode($consumer_key.':'.$consumer_secret);
  /**
   * initialse curl
   */
  $curl=curl_init();
  /**
   * set curl options
   * 
   */
  $header=[
    'Authorization:Basic '.$credentials
  ];
  curl_setopt($curl,CURLOPT_URL,$url);
  curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
  curl_setopt($curl,CURLOPT_HEADER,true);
  curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);

  $reponse=curl_exec($curl);
  echo json_decode($reponse);
}catch(Exception $e){
  echo $e->getMessage();
}