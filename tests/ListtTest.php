<?php

namespace SafePhp;

use PHPUnit\Framework\TestCase;
use SafePhp\Exceptions\InvalidTypeException;

class ListtTest extends TestCase
{

    public function testAddInvalidType()
    {
        $this->expectException(InvalidTypeException::class);

        $list = new Listt(Stringg::class);
        $list->add(new Integer(100));
    }

    public function testArrayAccessable()
    {
        $string = new Stringg('Hello');
        $list = new Listt(Stringg::class, $string);

        $this->assertEquals($string, $list[0]);
    }

    public function testIteratorable()
    {
        $string = new Stringg('Hello');
        $list = new Listt(Stringg::class, $string);

        foreach ($list as $item) {
            $this->assertEquals($string, $item);
        }
    }

}