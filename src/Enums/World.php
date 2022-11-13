<?php

namespace Nicekiwi\Census\Enums;

enum World: int
{
    case CONNERY = 1;
    case MILLER = 10;
    case COBALT = 13;
    case EMERALD = 17;
    case JAEGER = 19;
    case SOLTECH = 40;
    case GENUDINE = 1000;
    case CERES = 2000;

    public function getName(): string
    {
        return match($this) {
            self::CONNERY => 'Connery',
            self::MILLER => 'Miller',
            self::COBALT => 'Cobalt',
            self::EMERALD => 'Emerald',
            self::JAEGER => 'Jaeger',
            self::SOLTECH => 'SolTech',
            self::GENUDINE => 'Genudine',
            self::CERES => 'Ceres',
        };
    }

    public function getRegion(): WorldRegion
    {
        return match($this) {
            self::CONNERY, self::MILLER, self::COBALT, self::EMERALD, self::JAEGER, self::GENUDINE => WorldRegion::US,
            self::CERES => WorldRegion::EU,
            self::SOLTECH => WorldRegion::JP,
        };
    }

    public function getPlatform(): Platform
    {
        return match($this) {
            self::CONNERY, self::MILLER, self::COBALT, self::EMERALD, self::JAEGER, self::SOLTECH => Platform::PC,
            self::GENUDINE => Platform::PS4_US,
            self::CERES => Platform::PS4_EU,
        };
    }
}
