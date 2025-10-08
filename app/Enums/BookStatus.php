<?php

namespace App\Enums;

enum BookStatus: string
{
    case IN_STOCK = 'in stock';
    case IN_RENT = 'in rent';
    case IS_SALED = 'is saled';
}
