<?php

require_once './BankAccount.php';

class AccountService
{
    /**
     * @return BankAccount
     * @throws Exception
     */
    public function createAccount(): BankAccount
    {
        $initialBalance = 0;

        $account = new BankAccount($initialBalance);

        return $account;
    }

    /**
     * @param bool $auth
     * @param BankAccount $account
     * @param float $amount
     * @return void
     * @throws Exception
     */
    public function deposit(bool $auth, BankAccount $account, float $amount): void
    {
        $this->authValidation($auth);

        self::amountValidation($amount);

        $currentBalance = $account->getBalance();

        $newBalance = $currentBalance + $amount;

        $account->setBalance($newBalance);
    }

    /**
     * @param bool $auth
     * @param BankAccount $account
     * @param float $amount
     * @return void
     * @throws Exception
     */
    public function withdraw(bool $auth, BankAccount $account, float $amount): void
    {
        $this->authValidation($auth);

        self::amountValidation($amount);

        $currentBalance = $account->getBalance();

        self::withdrawValidation($amount, $currentBalance);

        $newBalance = $currentBalance - $amount;

        $account->setBalance($newBalance);
    }

    /**
     * @param bool $auth
     * @param BankAccount $bankAccount
     * @return float
     * @throws Exception
     */
    public function getBalance(bool $auth, BankAccount $bankAccount): float
    {
        $this->authValidation($auth);

        return $bankAccount->getBalance();
    }

    /**
     * @param float $amount
     * @return void
     * @throws Exception
     */
    public static function amountValidation(float $amount): void
    {
        if ($amount <= 0) {
            throw new Exception('Incorrect amount, must be greater than 0');
        }
    }

    /**
     * @param float $amount
     * @param float $balance
     * @return void
     * @throws Exception
     */
    public static function withdrawValidation(float $amount, float $balance): void
    {
        if($amount > $balance) {
            throw new Exception('There are not enough funds on the account');
        }
    }

    /**
     * @param $auth
     * @return void
     * @throws Exception
     */
    protected function authValidation($auth): void
    {
        if (!$auth) {
            throw new Exception('Access denied');
        }
    }
}