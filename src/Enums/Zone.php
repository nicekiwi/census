<?php

namespace Nicekiwi\Census\Enums;

enum Zone: int
{
    case INDAR = 2;
    case HOSSIN = 4;
    case AMERISH = 6;
    case ESAMIR = 8;
    case NEXUS = 10;
    case EXTINCTION = 11;
    case DESOLATION = 12;
    case ASCENSION = 13;
    case VR_TUTORIAL = 95;
    case VR_TRAINING_NC = 96;
    case VR_TRAINING_TR = 97;
    case VR_TRAINING_VS = 98;
    case DESOLATION_2 = 338;
    case OSHUR = 344;

    public function getName(): string
    {
        return match($this) {
            self::INDAR => 'Indar',
            self::HOSSIN => 'Hossin',
            self::AMERISH => 'Amerish',
            self::ESAMIR => 'Esamir',
            self::NEXUS => 'Nexus',
            self::EXTINCTION => 'Extinction',
            self::DESOLATION, self::DESOLATION_2 => 'Desolation',
            self::ASCENSION => 'Ascension',
            self::VR_TUTORIAL => 'VR Tutorial',
            self::VR_TRAINING_NC => 'VR Training NC',
            self::VR_TRAINING_TR => 'VR Training TR',
            self::VR_TRAINING_VS => 'VR Training VS',
            self::OSHUR => 'Oshur',
        };
    }
}
