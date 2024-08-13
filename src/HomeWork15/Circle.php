<?php

require_once './ValidationTrait.php';

class Circle extends Figure
{
    use ValidationTrait;

    public float $radius;

    /**
     * @param float $radius
     * @throws Exception
     */
    public function __construct(float $radius)
    {
        $this->validateGreaterThenZero($radius);
        $this->setRadius($radius);
    }

    /**
     * @param float $radius
     */
    public function setRadius(float $radius): void
    {
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * @return float
     */
    protected function area(): float
    {
        return M_PI * pow($this->getRadius(), 2);
    }

    /**
     * @return void
     */
    public function getArea(): void
    {
        echo $this->area() . PHP_EOL;
    }

    /**
     * @return float
     */
    protected function perimeter(): float
    {
        return 2 * pi() * $this->getRadius();
    }

    /**
     * @return void
     */
    public function getPerimeter(): void
    {
        echo $this->perimeter() . PHP_EOL;
    }

    /**
     * @return float
     */
    public function diameter(): float
    {
        return $this->getRadius() * 2;
    }

    /**
     * @return void
     */
    public function getDiameter(): void
    {
        echo $this->diameter() . PHP_EOL;
    }

}