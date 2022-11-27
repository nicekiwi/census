<?php

namespace Nicekiwi\Census\Enums;

enum Platform: string
{
    case PC = 'ps2';
    case PS4_US = "ps2ps4us";
    case PS4_EU = "ps2ps4eu";

    public function getName(): string
    {
        return match($this) {
            self::PC => 'PC',
            self::PS4_US => 'PS4 (US)',
            self::PS4_EU => 'PS4 (EU)',
        };
    }

    public function getPublicWorlds(): array
    {
        return match($this) {
            self::PC => [
                World::CONNERY,
                World::MILLER,
                World::COBALT,
                World::EMERALD,
                World::JAEGER,
                World::SOLTECH,
            ],
            self::PS4_US => [
                World::GENUDINE,
            ],
            self::PS4_EU => [
                World::CERES,
            ],
        };
    }

    public function getWorlds(): array
    {
        return match($this) {
            self::PC => [
                World::CONNERY,
                World::MILLER,
                World::COBALT,
                World::EMERALD,
                World::JAEGER,
                World::SOLTECH,
            ],
            self::PS4_US => [
                World::GENUDINE,
                World::PALOS,
                World::CRUX,
                World::SEARHUS,
                World::XELAS,
            ],
            self::PS4_EU => [
                World::CERES,
                World::LITHCORP,
                World::RASHNU,
            ],
        };
    }
}
