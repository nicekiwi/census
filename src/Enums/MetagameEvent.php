<?php

namespace Nicekiwi\Census\Enums;

enum MetagameEvent: string
{
    case CHARACTER_ACHIEVEMENT_EARNED = "AchievementEarned";
    case CHARACTER_DEATH = "Death";
    case CHARACTER_LOGIN = "PlayerLogin";
    case CHARACTER_LOGOUT = "PlayerLogout";
    case CHARACTER_FACILITY_CAPTURE = "PlayerFacilityCapture";
    case CHARACTER_FACILITY_DEFEND = "PlayerFacilityDefend";
    case CHARACTER_BATTLE_RANK_UP = "BattleRankUp";
    case CHARACTER_GAIN_XP = "GainExperience";
    case CHARACTER_ITEM_ADDED = "ItemAdded";
    case CHARACTER_SKILL_ADDED = "SkillAdded";
    case CHARACTER_VEHICLE_DESTROY = "VehicleDestroy";
    case ZONE_LOCK = "ContinentLock";
    case ZONE_UNLOCK = "ContinentUnlock";
    case ZONE_METAGAME_EVENT = "MetagameEvent";
    case ZONE_FACILITY_CONTROL = "FacilityControl";
}
