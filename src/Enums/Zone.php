<?php

namespace Nicekiwi\Census\Enums;

enum Zone: int
{
    case INDAR = 2;
    case HOSSIN = 4;
    case AMERISH = 6;
    case ESAMIR = 8;
    case OSHUR = 344;

    public function getName(): string
    {
        return match($this) {
            self::INDAR => 'Indar',
            self::HOSSIN => 'Hossin',
            self::AMERISH => 'Amerish',
            self::ESAMIR => 'Esamir',
            self::OSHUR => 'Oshur',
        };
    }
}
