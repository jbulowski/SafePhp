<?php

namespace SafePhp\Exceptions;

use Exception;

class InvalidTypeException extends Exception {

    /**
     * InvalidTypeException constructor.
     * @param string $class_name
     * @param string $type
     */
    public function __construct(string $class_name, string $type)
    {
        parent::__construct("{$class_name} only accepts type of {$type}");
    }

}