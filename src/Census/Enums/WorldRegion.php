<?php

namespace Nicekiwi\Census\Enums;

enum WorldRegion: int
{
    case US = 1;
    case EU = 2;
    case JP = 3;

    public function getCode(): string
    {
        return match($this) {
            self::US => 'us',
            self::EU => 'eu',
            self::JP => 'jp',
        };
    }

    public function getName(): string
    {
        return match($this) {
            self::US => 'United States',
            self::EU => 'Europe',
            self::JP => 'Japan',
        };
    }
}
