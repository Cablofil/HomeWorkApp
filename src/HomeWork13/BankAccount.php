<?php

class BankAccount
{
    protected int $accountNumber;
    private float $balance;

    /**
     * @throws Exception
     */
    public function __construct(float $balance)
    {
        $this->setAccountNumber();
        $this->setBalance($balance);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function setAccountNumber(): void
    {
        $this->accountNumber = random_int(10000000, PHP_INT_MAX);
    }

    /**
     * @param float $balance
     * @return void
     */
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @return int
     */
    public function getAccountNumber(): int
    {
        return $this->accountNumber;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }
}
