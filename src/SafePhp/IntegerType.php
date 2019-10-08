<?php
declare(strict_types=1);

namespace SafePhp;

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
    public function __construct(int $value, $range_from, $range_to)
    {
        if ($this->isInAllowedRange($value, $range_from, $range_to))
            throw new ArgumentOutOfRangeException(get_called_class(), $range_from, $range_to);

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
    public function isInAllowedRange(int $value, $range_from, $range_to)
    {
        return ($range_from > $value || $value > $range_to);
    }

}