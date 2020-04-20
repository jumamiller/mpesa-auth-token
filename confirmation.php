<?php

$callbackJSONData=file_get_contents('php://input');
$callbackData    =json_decode($callbackJSONData,true);

$transactionType        =$callbackData->TransactionType;
$transID                =$callbackData->TransID;
$transTime              =$callbackData->TransTime;
$transAmount            =$callbackData->TransAmount;
$businessShortCode      =$callbackData->BusinessShortCode;
$billRefNumber          =$callbackData->BillRefNumber;
$invoiceNumber          =$callbackData->InvoiceNumber;
$orgAccountBalance      =$callbackData->OrgAccountBalance;
$thirdPartyTransID      =$callbackData->ThirdPartyTransID;
$MSISDN                 =$callbackData->MSISDN;
$firstName              =$callbackData->FirstName;
$middleName             =$callbackData->MiddleName;
$lastName               =$callbackData->LastName;

$result=[
    $transTime          =>$transTime,
    $transAmount        =>$transAmount,
    $businessShortCode  =>$businessShortCode,
    $billRefNumber      =>$billRefNumber,
    $invoiceNumber      =>$invoiceNumber,
    $orgAccountBalance  =>$orgAccountBalance,
    $thirdPartyTransID  =>$thirdPartyTransID,
    $MSISDN             =>$MSISDN,
    $firstName          =>$firstName,
    $lastName           =>$lastName,
    $middleName         =>$middleName,
    $transID            =>$transID,
    $transactionType    =>$transactionType

];
echo '{"ResultCode":0, "ResultDesc":"Accepted", "ThirdPartyTransID": 0}';
echo $result;
