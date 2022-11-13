<?php

namespace Nicekiwi\Census\Data;

use Nicekiwi\Census\Enums\Zone;

class ZoneEvents
{
    static array $list = [
        1 => [
            'name' => "Feeling the Heat",
            'description' => "Capture Indar within the time limit",
            'type' => 1,
            'zoneId' => Zone::INDAR,
        ],
      2 => [
        'name' => "Cold War",
        'description' => "Capture Esamir within the time limit",
        'type' => 1,
        'zoneId' => Zone::ESAMIR,
      ],
      3 => [
        'name' => "Seeing Green",
        'description' => "Capture Amerish within the time limit",
        'type' => 1,
        'zoneId' => Zone::AMERISH,
      ],
      4 => [
        'name' => "Marsh Madness",
        'description' => "Capture Hossin within the time limit",
        'type' => 1,
        'zoneId' => Zone::HOSSIN,
      ],
      7 => [
        'name' => "Dome Domination",
        'description' => "Capture and hold all 3 Biolabs on Amerish",
        'type' => 2,
        'zoneId' => Zone::AMERISH,
      ],
      8 => [
        'name' => "Technological Advancement",
        'description' => "Capture and hold all 3 Tech Plants on Amerish",
        'type' => 2,
        'zoneId' => Zone::AMERISH,
      ],
      9 => [
        'name' => "Power Rush",
        'description' => "Capture and hold all 3 Amp Stations on Amerish",
        'type' => 2,
        'zoneId' => Zone::AMERISH,
      ],
      10 => [
        'name' => "Dome Domination",
        'description' => "Capture and hold all 3 Biolabs on Indar",
        'type' => 2,
        'zoneId' => Zone::INDAR,
      ],
      11 => [
        'name' => "Technological Advancement",
        'description' => "Capture and hold all 3 Tech Plants on Indar",
        'type' => 2,
        'zoneId' => Zone::INDAR,
      ],
      12 => [
        'name' => "Power Rush",
        'description' => "Capture and hold all 3 Amp Stations on Indar",
        'type' => 2,
        'zoneId' => Zone::INDAR,
      ],
      13 => [
        'name' => "Dome Domination",
        'description' => "Capture and hold all 3 Biolabs on Esamir",
        'type' => 2,
        'zoneId' => Zone::ESAMIR,
      ],
      14 => [
        'name' => "Power Rush",
        'description' => "Capture and hold all 3 Amp Stations on Esamir",
        'type' => 2,
        'zoneId' => Zone::ESAMIR,
      ],
      16 => [
        'name' => "Dome Domination",
        'description' => "Capture and hold all 3 Biolabs on Hossin",
        'type' => 2,
        'zoneId' => Zone::HOSSIN,
      ],
      17 => [
        'name' => "Technological Advancement",
        'description' => "Capture and hold all 3 Tech Plants on Hossin",
        'type' => 2,
        'zoneId' => Zone::HOSSIN,
      ],
      18 => [
        'name' => "Power Rush",
        'description' => "Capture and hold all 3 Amp Stations on Hossin",
        'type' => 2,
        'zoneId' => Zone::HOSSIN,
      ],
      106 => [
        'name' => "Conquest",
        'description' => "Capture bases and kill enemies to earn points.",
        'type' => 6,
      ],
      123 => [
        'name' => "Indar Superiority",
        'description' => "Control territory to lock Indar",
        'type' => 8,
        'zoneId' => Zone::INDAR,
      ],
      124 => [
        'name' => "Indar Enlightenment",
        'description' => "Control territory to lock Indar",
        'type' => 8,
        'zoneId' => Zone::INDAR,
      ],
      125 => [
        'name' => "Indar Liberation",
        'description' => "Control territory to lock Indar",
        'type' => 8,
        'zoneId' => Zone::INDAR,
      ],
      126 => [
        'name' => "Esamir Superiority",
        'description' => "Control territory to lock Esamir",
        'type' => 8,
        'zoneId' => Zone::ESAMIR,
      ],
      127 => [
        'name' => "Esamir Enlightenment",
        'description' => "Control territory to lock Esamir",
        'type' => 8,
        'zoneId' => Zone::ESAMIR,
      ],
      128 => [
        'name' => "Esamir Liberation",
        'description' => "Control territory to lock Esamir",
        'type' => 8,
        'zoneId' => Zone::ESAMIR,
      ],
      129 => [
        'name' => "Hossin Superiority",
        'description' => "Control territory to lock Hossin",
        'type' => 8,
        'zoneId' => Zone::HOSSIN,
      ],
      130 => [
        'name' => "Hossin Enlightenment",
        'description' => "Control territory to lock Hossin",
        'type' => 8,
        'zoneId' => Zone::HOSSIN,
      ],
      131 => [
        'name' => "Hossin Liberation",
        'description' => "Control territory to lock Hossin",
        'type' => 8,
        'zoneId' => Zone::HOSSIN,
      ],
      132 => [
        'name' => "Amerish Superiority",
        'description' => "Control territory to lock Amerish",
        'type' => 8,
        'zoneId' => Zone::AMERISH,
      ],
      133 => [
        'name' => "Amerish Enlightenment",
        'description' => "Control territory to lock Amerish",
        'type' => 8,
        'zoneId' => Zone::AMERISH,
      ],
      134 => [
        'name' => "Amerish Liberation",
        'description' => "Control territory to lock Amerish",
        'type' => 8,
        'zoneId' => Zone::AMERISH,
      ],
      147 => [
        'name' => "Indar Superiority",
        'description' => "Control territory to lock Indar",
        'type' => 9,
        'zoneId' => Zone::INDAR,
      ],
      148 => [
        'name' => "Indar Enlightenment",
        'description' => "Control territory to lock Indar",
        'type' => 9,
        'zoneId' => Zone::INDAR,
      ],
      149 => [
        'name' => "Indar Liberation",
        'description' => "Control territory to lock Indar",
        'type' => 9,
        'zoneId' => Zone::INDAR,
      ],
      150 => [
        'name' => "Esamir Superiority",
        'description' => "Control territory to lock Esamir",
        'type' => 9,
        'zoneId' => Zone::ESAMIR,
      ],
      151 => [
        'name' => "Esamir Enlightenment",
        'description' => "Control territory to lock Esamir",
        'type' => 9,
        'zoneId' => Zone::ESAMIR,
      ],
      152 => [
        'name' => "Esamir Liberation",
        'description' => "Control territory to lock Esamir",
        'type' => 9,
        'zoneId' => Zone::ESAMIR,
      ],
      153 => [
        'name' => "Hossin Superiority",
        'description' => "Control territory to lock Hossin",
        'type' => 9,
        'zoneId' => Zone::HOSSIN,
      ],
      154 => [
        'name' => "Hossin Enlightenment",
        'description' => "Control territory to lock Hossin",
        'type' => 9,
        'zoneId' => Zone::HOSSIN,
      ],
      155 => [
        'name' => "Hossin Liberation",
        'description' => "Control territory to lock Hossin",
        'type' => 9,
        'zoneId' => Zone::HOSSIN,
      ],
      156 => [
        'name' => "Amerish Superiority",
        'description' => "Control territory to lock Amerish",
        'type' => 9,
        'zoneId' => Zone::AMERISH,
      ],
      157 => [
        'name' => "Amerish Enlightenment",
        'description' => "Control territory to lock Amerish",
        'type' => 9,
        'zoneId' => Zone::AMERISH,
      ],
      158 => [
        'name' => "Amerish Liberation",
        'description' => "Control territory to lock Amerish",
        'type' => 9,
        'zoneId' => Zone::AMERISH,
      ],
      159 => [
        'name' => "Amerish Warpgates Stabilizing",
        'description' => "Additional territories are coming back online.",
        'type' => 5,
        'zoneId' => Zone::AMERISH,
      ],
      160 => [
        'name' => "Esamir Warpgates Stabilizing",
        'description' => "Additional territories are coming back online.",
        'type' => 5,
        'zoneId' => Zone::ESAMIR,
      ],
      161 => [
        'name' => "Indar Warpgates Stabilizing",
        'description' => "Additional territories are coming back online.",
        'type' => 5,
        'zoneId' => Zone::INDAR,
      ],
      162 => [
        'name' => "Hossin Warpgates Stabilizing",
        'description' => "Additional territories are coming back online.",
        'type' => 5,
        'zoneId' => Zone::HOSSIN,
      ],
      164 => [
        'name' => "Technological Advancement",
        'description' => "Capture and hold all 3 Tech Plants on Esamir",
        'type' => 2,
        'zoneId' => Zone::ESAMIR,
      ],
      167 => [
        'name' => "Aerial Anomalies",
        'description' => "Take readings of aerial anomalies",
        'type' => 10,
      ],
      168 => [
        'name' => "Eye of the Storm",
        'description' =>
          "Gather Tempest from the meteor site and return it to your Warpgate.",
        'type' => 10,
        'zoneId' => Zone::ESAMIR,
      ],
      170 => [
        'name' => "The Bending",
        'description' =>
          "A deadly meteor shower is wreaking havoc across the continent.",
        'type' => 5,
        'zoneId' => Zone::ESAMIR,
      ],
      172 => [
        'name' => "Aerial Anomalies",
        'description' => "Take readings of aerial anomalies",
        'type' => 10,
      ],
      173 => [
        'name' => "Aerial Anomalies",
        'description' => "Take readings of aerial anomalies",
        'type' => 10,
      ],
      174 => [
        'name' => "Aerial Anomalies",
        'description' => "Take readings of aerial anomalies",
        'type' => 10,
      ],
      175 => [
        'name' => "Race for Readings",
        'description' => "Take readings of aerial anomalies",
        'type' => 10,
      ],
      176 => [
        'name' => "Esamir Unstable Meltdown",
        'description' => "Control territory to lock Esamir",
        'type' => 9,
        'zoneId' => Zone::ESAMIR,
      ],
      177 => [
        'name' => "Hossin Unstable Meltdown",
        'description' => "Control territory to lock Hossin",
        'type' => 9,
        'zoneId' => Zone::HOSSIN,
      ],
      178 => [
        'name' => "Amerish Unstable Meltdown",
        'description' => "Control territory to lock Amerish",
        'type' => 9,
        'zoneId' => Zone::AMERISH,
      ],
      179 => [
        'name' => "Indar Unstable Meltdown",
        'description' => "Control territory to lock Indar",
        'type' => 9,
        'zoneId' => Zone::INDAR,
      ],
      180 => [
        'name' => "Gaining Ground",
        'description' => "Capture and hold the most Large Outposts",
        'type' => 2,
      ],
      181 => [
        'name' => "Gaining Ground",
        'description' => "Capture and hold the most Large Outposts",
        'type' => 2,
      ],
      182 => [
        'name' => "Gaining Ground",
        'description' => "Capture and hold the most Large Outposts",
        'type' => 2,
      ],
      183 => [
        'name' => "Gaining Ground",
        'description' => "Capture and hold the most Large Outposts",
        'type' => 2,
      ],
      186 => [
        'name' => "Esamir Unstable Meltdown",
        'description' => "Control territory to lock Esamir",
        'type' => 9,
        'zoneId' => Zone::ESAMIR,
      ],
      187 => [
        'name' => "Hossin Unstable Meltdown",
        'description' => "Control territory to lock Hossin",
        'type' => 9,
        'zoneId' => Zone::HOSSIN,
      ],
      188 => [
        'name' => "Amerish Unstable Meltdown",
        'description' => "Control territory to lock Amerish",
        'type' => 9,
        'zoneId' => Zone::AMERISH,
      ],
      189 => [
        'name' => "Indar Unstable Meltdown",
        'description' => "Control territory to lock Indar",
        'type' => 9,
        'zoneId' => Zone::INDAR,
      ],
      190 => [
        'name' => "Esamir Unstable Meltdown",
        'description' => "Control territory to lock Esamir",
        'type' => 9,
        'zoneId' => Zone::ESAMIR,
      ],
      191 => [
        'name' => "Hossin Unstable Meltdown",
        'description' => "Control territory to lock Hossin",
        'type' => 9,
        'zoneId' => Zone::HOSSIN,
      ],
      192 => [
        'name' => "Amerish Unstable Meltdown",
        'description' => "Control territory to lock Amerish",
        'type' => 9,
        'zoneId' => Zone::AMERISH,
      ],
      193 => [
        'name' => "Indar Unstable Meltdown",
        'description' => "Control territory to lock Indar",
        'type' => 9,
        'zoneId' => Zone::INDAR,
      ],
      194 => [
        'name' => "Refine and Refuel",
        'description' => "Deposit Cortium into the refinery",
        'type' => 10,
      ],
      195 => [
        'name' => "Refine and Refuel",
        'description' => "Deposit Cortium into the refinery",
        'type' => 10,
      ],
      196 => [
        'name' => "Refine and Refuel",
        'description' => "Deposit Cortium into the refinery",
        'type' => 10,
      ],
      197 => [
        'name' => "Refine and Refuel",
        'description' => "Deposit Cortium into the refinery",
        'type' => 10,
      ],
      198 => [
        'name' => "Maximum Pressure",
        'description' => "Kill as many enemies as possible",
        'type' => 6,
      ],
      199 => [
        'name' => "Maximum Pressure",
        'description' => "Kill as many enemies as possible",
        'type' => 6,
      ],
      200 => [
        'name' => "Maximum Pressure",
        'description' => "Kill as many enemies as possible",
        'type' => 6,
      ],
      201 => [
        'name' => "Maximum Pressure",
        'description' => "Kill as many enemies as possible",
        'type' => 6,
      ],
      204 => [
        'name' => "OUTFIT WARS",
        'description' => "Capture Active Vanu Relics",
        'type' => 10,
      ],
      205 => [
        'name' => "OUTFIT WARS (pre-match)",
        'description' => "Prepare for the Outfit War!",
        'type' => 4,
      ],
      206 => [
        'name' => "OUTFIT WARS",
        'description' => "Active Relics Changing",
        'type' => 10,
      ],
      207 => [
        'name' => "OUTFIT WARS",
        'description' => "Earn 750 points or have the most when time expires.",
        'type' => 10,
      ],
      208 => [
        'name' => "Koltyr Liberation",
        'description' => "Control territory to lock Koltyr",
        'type' => 9,
      ],
      209 => [
        'name' => "Koltyr Superiority",
        'description' => "Control territory to lock Koltyr",
        'type' => 9,
      ],
      210 => [
        'name' => "Koltyr Enlightenment",
        'description' => "Control territory to lock Koltyr",
        'type' => 9,
      ],
      215 => [
        'name' => "Conquest",
        'description' => "Capture bases and kill enemies to earn points.",
        'type' => 6,
      ],
    ];

    public function getById(int $id): ?array
    {
        return $this->events[$id] ?? null;
    }
}
