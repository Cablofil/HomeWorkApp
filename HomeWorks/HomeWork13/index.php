<?php

require_once './AccountService.php';

$accountService = new AccountService();
try {

$account = $accountService->createAccount();

$accountService->deposit(true, $account, 500);

$balance = $accountService->getBalance(true, $account);

echo $balance . PHP_EOL;

$accountService->withdraw(true, $account, 300);

echo $accountService->getBalance(true, $account) . PHP_EOL;

//    AccountService::withdrawValidation(500, 100);

} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
    exit;
}



