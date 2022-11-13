<?php

namespace Nicekiwi\Census\Enums;

enum WorldState: int
{
    case ONLINE = 3;
    case OFFLINE = 1;
    case LOCKED = 2;

    public function getName(): string
    {
        return match($this) {
            self::ONLINE => 'Online',
            self::OFFLINE => 'Offline',
            self::LOCKED => 'Locked',
        };
    }
}
