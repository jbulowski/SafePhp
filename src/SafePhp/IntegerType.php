<?php
declare(strict_types=1);

namespace SafePhp;

use \InvalidArgumentException;
use SafePhp\Exceptions\ArgumentOutOfRangeException;

abstract class IntegerType
{
    protected const RANGE_FROM = 0;

    protected const RANGE_TO = 0;

    protected $value;

    /**
     * IntegerType constructor.
     * @param int $value
     * @param int|float $range_from
     * @param int|float $range_to
     * @throws ArgumentOutOfRangeException
     */
    public function __construct($value, $range_from, $range_to)
    {
        /*
         * InvalidArgumentException gets thrown only when uLong used
         * because of php max integer value is bigger than uLong's max value
         * so it gets casted to float, so we can't typehint $value as int
         *
         * */
        if (!filter_var($value, FILTER_VALIDATE_INT) || !filter_var($value, FILTER_VALIDATE_FLOAT))
            throw new InvalidArgumentException(static::class . ' only allows numeric values');

        if ($this->isInAllowedRange($value, $range_from, $range_to))
            throw new ArgumentOutOfRangeException(static::class, $range_from, $range_to);

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->value;
    }

    /**
     * @return int
     */
    public function __invoke()
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @param int|float $range_from
     * @param int|float $range_to
     * @return bool
     */
    public function isInAllowedRange(int $value, $range_from, $range_to): bool
    {
        return ($range_from > $value || $value > $range_to);
    }

}