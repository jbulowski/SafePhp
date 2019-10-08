<?php
declare(strict_types=1);

namespace SafePhp;

use SafePhp\Exceptions\ArgumentOutOfRangeException;
use SafePhp\Interfaces\SafePhpInterface;

class uShort extends IntegerType implements SafePhpInterface
{

    protected const RANGE_FROM = 0;

    protected const RANGE_TO = 65535;

    protected $value;

    /**
     * sByte constructor.
     * @param int $value
     * @throws ArgumentOutOfRangeException
     */
    public function __construct(int $value)
    {
        parent::__construct($value, self::RANGE_FROM, self::RANGE_TO);
    }


}