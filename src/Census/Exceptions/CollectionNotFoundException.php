<?php

namespace Nicekiwi\Census\Exceptions;

use Exception;

class CollectionNotFoundException extends Exception
{
    public function __construct(string $collection)
    {
        parent::__construct('Collection [' . $collection . '] not found');
    }
}
