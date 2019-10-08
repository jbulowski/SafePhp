<?php

namespace SafePhp\Exceptions;

use Exception;

class IndexOutOfRangeException extends Exception {

    /**
     * IndexOutOfRangeException constructor.
     * @param string $class_name
     * @param int $limit
     */
    public function __construct( string $class_name, int $limit)
    {
        parent::__construct("{$class_name} has a limit of {$limit}");
    }

}