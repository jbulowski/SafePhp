<?php
declare(strict_types=1);

namespace SafePhp;

use SafePhp\Exceptions\ArgumentOutOfRangeException;
use SafePhp\Interfaces\SafePhpInterface;

class Integer extends IntegerType implements SafePhpInterface
{

    protected const RANGE_FROM = -2147483647;

    protected const RANGE_TO = 2147483648;

    /**
     * Integer constructor.
     * @param int $value
     * @throws ArgumentOutOfRangeException
     */
    public function __construct(int $value)
    {
        parent::__construct($value, self::RANGE_FROM, self::RANGE_TO);
    }

}