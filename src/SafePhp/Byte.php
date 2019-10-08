<?php
declare(strict_types=1);

namespace SafePhp;

use SafePhp\Exceptions\ArgumentOutOfRangeException;
use SafePhp\Interfaces\SafePhpInterface;

class Byte extends IntegerType implements SafePhpInterface
{

    protected const RANGE_FROM = 0;

    protected const RANGE_TO = 255;

    protected $value;

    /**
     * Byte constructor.
     * @param int $value
     * @throws ArgumentOutOfRangeException
     */
    public function __construct(int $value)
    {
        parent::__construct($value, self::RANGE_FROM, self::RANGE_TO);
    }


}