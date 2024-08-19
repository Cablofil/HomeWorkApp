<?php

enum Priority: int
{
    case LOW = 1;

    case MEDIUM = 5;

    case HIGH = 10;

    /**
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
