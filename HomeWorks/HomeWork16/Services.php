<?php

require_once './ValidationTrait.php';

class Services
{
    use ValidationTrait;

    protected string $name;

    protected float $price;

    protected string $termOfService;

    /**
     * @param string $name
     * @param float $price
     * @param string $termOfService
     * @throws Exception
     */
    public function __construct(string $name, float $price, string $termOfService)
    {
        $this->validateName($name);
        $this->validatePrice($price);

        $this->setName($name);
        $this->setPrice($price);
        $this->setTermOfService($termOfService);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param string $termOfService
     */
    public function setTermOfService(string $termOfService): void
    {
        $this->termOfService = $termOfService;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTermOfService(): string
    {
        return $this->termOfService;
    }

}