<?php

namespace SmartLib\BaseConverter\Test;


use PHPUnit\Framework\TestCase;
use SmartLib\BaseConverter\Base;
use SmartLib\BaseConverter\Exceptions\IndexOutOfBondException;
use SmartLib\BaseConverter\Exceptions\InvalidDelimiterException;
use SmartLib\BaseConverter\Exceptions\InvalidNegateSymbolException;
use SmartLib\BaseConverter\Exceptions\InvalidNumberBaseException;
use SmartLib\BaseConverter\Exceptions\NonUniqueCharactersException;
use SmartLib\BaseConverter\Exceptions\UnsupportedDefaultBaseException;

class BaseThrowExceptionsTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testUnsupportedDefaultBaseException()
    {
        $this->expectException(UnsupportedDefaultBaseException::class);
        $base = new Base(128);
    }

    /**
     * @throws \Exception
     */
    public function testInvalidNumberBaseException()
    {
        $this->expectException(InvalidNumberBaseException::class);
        $base = new Base(2, '012');
    }

    /**
     * @throws \Exception
     */
    public function testNonUniqueCharactersException()
    {
        $this->expectException(NonUniqueCharactersException::class);
        $base = new Base(8, '12121212');
    }

    /**
     * @throws \Exception
     */
    public function testInvalidDelimiterException()
    {
        $this->expectException(InvalidDelimiterException::class);
        $base = new Base(10, null, '5');
    }

    /**
     * @throws \Exception
     */
    public function testInvalidNegateSymbolException()
    {
        $this->expectException(InvalidNegateSymbolException::class);
        $base = new Base(10, null, '.', '5');
    }

    /**
     * @throws \Exception
     */
    public function testIndexOutOfBondException()
    {
        $this->expectException(IndexOutOfBondException::class);
        $base = new Base(10);
        $char = $base->char(11);
    }
}