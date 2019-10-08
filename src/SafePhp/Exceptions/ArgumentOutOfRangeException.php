<?php

namespace SafePhp\Exceptions;

use Exception;

class ArgumentOutOfRangeException extends Exception
{

    /**
     * ArgumentOutOfRangeException constructor.
     * @param string $class_name
     * @param int $from
     * @param int $to
     */
    public function __construct(string $class_name, int $from, int $to)
    {
        parent::__construct("{$class_name} only allows integer values between {$from} and {$to}");
    }
}