<?php

namespace Nicekiwi\Census\Enums;

enum MetagameEventState: int
{
    case STARTED = 135;
    case RESTARTED = 136;
    case CANCELED = 137;
    case ENDED = 138;
    case XP_BONUS_CHANGED = 139;
}
