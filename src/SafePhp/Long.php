<?php
declare(strict_types=1);

namespace SafePhp;

use SafePhp\Exceptions\ArgumentOutOfRangeException;
use SafePhp\Interfaces\SafePhpInterface;

class Long extends IntegerType implements SafePhpInterface
{

    protected const RANGE_FROM = -9223372036854775808;

    protected const RANGE_TO = 9223372036854775807;

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