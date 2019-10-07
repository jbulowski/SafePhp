<?php
declare(strict_types=1);

namespace SafePhp;

use PHPUnit\Framework\TestCase;

final class StringgTest extends TestCase
{

    public function testToString()
    {
        $string = new Stringg('Hello');

        // Testing __toString
        $this->assertEquals('Hello', $string);

        // Testing __invoke
        $this->assertEquals('Hello', $string());
    }

    public function testCharsCount()
    {
        $string = new Stringg('Hello');
        $this->assertEquals(5, $string->length());
    }

    public function testStringToCharsArray()
    {
        $string = new Stringg('Hello');
        $this->assertEquals(['H', 'e', 'l', 'l', 'o'], $string->toArray());
    }

    public function testArrayAccessable()
    {
        $string = new Stringg('Hello');
        $this->assertEquals('H', $string[0]);
    }

    public function testIteratorable()
    {
        $string = new Stringg('Hello');
        $i = 0;
        foreach ($string as $char) {
            $this->assertEquals($string[$i], $char);
            $i++;
        }
    }

}