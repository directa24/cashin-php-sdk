<?php

namespace Directa24;


require_once "../vendor/autoload.php";

use Directa24\model\BankAccount;
use Directa24\request\CreateRefundRequest;



$bank_account = new BankAccount();
$bank_account->bank_code = "01";
$bank_account->account_number = "3242342";
$bank_account->account_type = "SAVING";
$bank_account->beneficiary = "Ricardo Carlos";
$bank_account->branch = "12";


$create_refund_request = new CreateRefundRequest();
$create_refund_request->deposit_id = 94600022;
$create_refund_request->invoice_id = '8318';
$create_refund_request->amount = 1;
$create_refund_request->bank_account = $bank_account;
$create_refund_request->comments = 'test';
$create_refund_request->notification_url = "https://yoursite.com/deposit/108/confirm";


$directa24 = Directa24::getInstance("fUEhPEKrUt", "lTMZgRTakW", "wSHTfsMMdNskTppilncuZPEklgLmdUAOg");

try {
    $refund_id = $directa24->refund($create_refund_request);
    echo $refund_id;
} catch (\Directa24Exception $ex) {
    echo $ex;
}