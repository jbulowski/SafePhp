<?php

namespace SafePhp;

use PHPUnit\Framework\TestCase;
use SafePhp\Exceptions\ArgumentOutOfRangeException;

class IntegerTest extends TestCase
{

    public function testAddInvalidType()
    {
        $this->expectException(ArgumentOutOfRangeException::class);

        // 2147483649 is one bigger than SafePhp\Integer's max value
        (new Integer(2147483649));
    }


}