<?php

namespace system\Enums;

enum QueryType: string
{
    case SELECT = 'SELECT';
    case INSERT = 'INSERT';
    case WHERE = 'WHERE';
    case LIMIT = 'LIMIT';

}
