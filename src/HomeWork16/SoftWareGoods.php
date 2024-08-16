<?php

require_once './ValidationTrait.php';

class SoftWareGoods
{
    use ValidationTrait;

    protected string $name;

    protected string $productionDate;

    protected float $price;

    protected string $osType;

    protected bool $preOrder;

    /**
     * @param string $name
     * @param float $price
     * @param string $productionDate
     * @param string $osType
     * @param bool $preOrder
     * @throws Exception
     */
    public function __construct(string $name, float $price, string $productionDate, string $osType, bool $preOrder = false)
    {
        if(!$preOrder) {
            $this->validateProductionDate($productionDate);
        }

        $this->validateName($name);
        $this->validatePrice($price);

        $this->setName($name);
        $this->setProductionDate($productionDate);
        $this->setPrice($price);
        $this->setOsType($osType);
        $this->setPreOrder($preOrder);
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
     * @param string $productionDate
     */
    public function setProductionDate(string $productionDate): void
    {
        $this->productionDate = $productionDate;
    }

    /**
     * @param string $osType
     */
    public function setOsType(string $osType): void
    {
        $this->osType = $osType;
    }

    /**
     * @param bool $preOrder
     */
    public function setPreOrder(bool $preOrder): void
    {
        $this->preOrder = $preOrder;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getProductionDate(): string
    {
        return $this->productionDate;
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
    public function getOsType(): string
    {
        return $this->osType;
    }

    /**
     * @return bool
     */
    public function getPreOrder(): bool
    {
        return $this->preOrder;
    }

}