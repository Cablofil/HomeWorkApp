<?php

require_once './ValidationTrait.php';

class Rectangle extends Figure
{
    use ValidationTrait;

    public float $height;

    public float $width;

    /**
     * @param float $height
     * @param float $width
     * @throws Exception
     */
    public function __construct(float $height, float $width)
    {
        $this->validateGreaterThenZero($height, $width);

        $this->setHeight($height);
        $this->setWidth($width);
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @param float $width
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @return float
     */
    protected function perimeter(): float
    {
        return 2 * ($this->getWidth() + $this->getHeight());
    }

    /**
     * @return void
     */
    public function getPerimeter(): void
    {
        echo $this->perimeter();
    }

    /**
     * @return float
     */
    protected function area(): float
    {
        return $this->getHeight() * $this->getWidth();
    }

    /**
     * @return void
     */
    public function getArea(): void
    {
        echo $this->area();
    }

}