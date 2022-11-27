<?php

namespace Nicekiwi\Census\Enums;

/**
 * Type of expected StreamClient results
 */
enum MessageType: string
{
    case SERVICE_MESSAGE = 'serviceMessage';
    case HEARTBEAT = 'heartbeat';
    case SERVICE_STATE_CHANGED = 'serviceStateChanged';
    case CONNECTION_STATE_CHANGED = 'connectionStateChanged';
}
