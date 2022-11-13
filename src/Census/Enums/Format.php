<?php

namespace Nicekiwi\Census\Enums;

/**
 * Format of ApiClient results
 */
enum Format: string
{
    case JSON = 'json';
    case XML = 'xml';
}
