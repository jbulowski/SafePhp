<?php
declare(strict_types=1);

namespace SafePhp;

use SafePhp\Exceptions\ArgumentOutOfRangeException;
use SafePhp\Interfaces\SafePhpInterface;

class uLong extends IntegerType implements SafePhpInterface
{

    protected const RANGE_FROM = 0;

    protected const RANGE_TO = 18446744073709551615;

    /**
     * Integer constructor.
     * @param int|float $value
     * @throws ArgumentOutOfRangeException
     */
    public function __construct($value)
    {
        parent::__construct($value, self::RANGE_FROM, self::RANGE_TO);
    }

}