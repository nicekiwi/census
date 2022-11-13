<?php

namespace Nicekiwi\Census\Exceptions;

use Exception;

class CollectionEmptyException extends Exception
{
    public function __construct(string $collection)
    {
        parent::__construct('Collection [' . $collection . '] empty');
    }
}
