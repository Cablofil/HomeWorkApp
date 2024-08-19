<?php

abstract class Figure
{
    /**
     * @return float
     */
    abstract protected function area(): float;

    /**
     * @return float
     */
    abstract protected function perimeter(): float;
}