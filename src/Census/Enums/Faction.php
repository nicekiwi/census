<?php

namespace Nicekiwi\Census\Enums;

enum Faction: int
{
    case VS = 1;
    case NC = 2;
    case TR = 3;
    case NS = 4;

    public function getValues(): array
    {
        return [
            self::VS,
            self::NC,
            self::TR,
            self::NS,
        ];
    }

    public function getCode(): string
    {
        return match($this) {
            self::VS => 'vs',
            self::NC => 'nc',
            self::TR => 'tr',
            self::NS => 'ns',
        };
    }

    public function getName(): string
    {
        return match($this) {
            self::VS => 'Vanu Sovereignty',
            self::NC => 'New Conglomerate',
            self::TR => 'Terran Republic',
            self::NS => 'Nanite Systems Operations'
        };
    }
}
