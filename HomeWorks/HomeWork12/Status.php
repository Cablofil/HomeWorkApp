<?php

enum Status: string
{
    case DONE = 'Виконано';

    case UNDONE = 'Невиконано';

    /**
     * @return array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
