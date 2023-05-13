<?php

namespace Nicekiwi\Census\Enums;

enum World: int
{
    case CONNERY = 1;
    case MILLER = 10;
    case COBALT = 13;
    case EMERALD = 17;
    case JAEGER = 19;
    case APEX = 24;
    case BRIGGS = 25;
    case SOLTECH = 40;
    case GENUDINE = 1000;
    case PALOS = 1001;
    case CRUX = 1002;
    case SEARHUS = 1003;
    case XELAS = 1004;
    case CERES = 2000;
    case LITHCORP = 2001;
    case RASHNU = 2002;

    public function getName(): string
    {
        return match($this) {
            self::CONNERY => 'Connery',
            self::MILLER => 'Miller',
            self::COBALT => 'Cobalt',
            self::EMERALD => 'Emerald',
            self::JAEGER => 'Jaeger',
            self::APEX => 'Apex',
            self::BRIGGS => 'Briggs',
            self::SOLTECH => 'SolTech',
            self::GENUDINE => 'Genudine',
            self::PALOS => 'Palos',
            self::CRUX => 'Crux',
            self::SEARHUS => 'Searhus',
            self::XELAS => 'Xelas',
            self::CERES => 'Ceres',
            self::LITHCORP => 'Lithcorp',
            self::RASHNU => 'Rashnu',
        };
    }

    public function getRegion(): WorldRegion
    {
        return match($this) {
            self::BRIGGS, self::APEX, self::CONNERY, self::MILLER, self::COBALT, self::EMERALD, self::JAEGER, self::GENUDINE, self::PALOS, self::CRUX, self::SEARHUS, self::XELAS => WorldRegion::US,
            self::CERES, self::LITHCORP, self::RASHNU => WorldRegion::EU,
            self::SOLTECH => WorldRegion::JP,
        };
    }

    public function getPlatform(): Platform
    {
        return match($this) {
            self::BRIGGS, self::APEX, self::CONNERY, self::MILLER, self::COBALT, self::EMERALD, self::JAEGER, self::SOLTECH => Platform::PC,
            self::GENUDINE, self::PALOS, self::CRUX, self::SEARHUS, self::XELAS => Platform::PS4_US,
            self::CERES, self::LITHCORP, self::RASHNU => Platform::PS4_EU,
        };
    }

    public function isPublic(): bool
    {
        return match($this) {
            self::CONNERY, self::MILLER, self::COBALT, self::EMERALD, self::SOLTECH, self::GENUDINE, self::CERES => true,
            default => false,
        };
    }
}
