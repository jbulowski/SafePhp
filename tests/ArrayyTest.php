<?php

namespace SafePhp;

use SafePhp\Exceptions\IndexOutOfRangeException;
use SafePhp\Exceptions\InvalidTypeException;
use PHPUnit\Framework\TestCase;

class ArrayyTest extends TestCase
{

    public function testAddIndexOutOfRangeException()
    {
        $this->expectException(IndexOutOfRangeException::class);

        $array = new Arrayy(1, Dummy::class);
        $array->add(new Dummy());
        $array->add(new Dummy());

    }

    public function testAddInvalidType()
    {
        $this->expectException(InvalidTypeException::class);

        $array = new Arrayy(1, Stringg::class);
        $array->add(new Dummy());
    }



    public function testArrayAccessable()
    {
        $string = new Stringg('Hello');
        $array = new Arrayy(1, Stringg::class, $string);

        $this->assertEquals($string, $array[0]);
    }

    public function testIteratorable()
    {
        $string = new Stringg('Hello');
        $array = new Arrayy(1, Stringg::class, $string);

        foreach ($array as $item) {
            $this->assertEquals($string, $item);
        }
    }


}